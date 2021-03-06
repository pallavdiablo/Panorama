import config
import csv
import utils
import MySQLdb
import os
from datetime import datetime 

# return the list of files within the directory
def getCsvFileNames( directory ):
	csvfiles = []
	contents = os.listdir( directory )
	
	for item in contents:
		if os.path.isfile( directory+"/"+item ):
			if item.split(".")[-1].lower() == "csv":
				csvfiles.append(item)

	return csvfiles

# Convert the date input through excel file into standard MySQL DATE format
def convert2SqlDate( li ):
	print "@@@ convert2SqlDate invoked. li : " + str(li)
	# Convert li[1] to lowercase before using it as dictionary key
	days_in_months = {	
				"jan" : 31, "january" : 31, "1" : 31, "01" : 31,
				# number of days in FEBRUARY depends on the year (leap year or not)
				"mar" : 31, "march" : 31, "3" : 31, "03" : 31,
				"apr" : 30, "april" : 30, "4" : 30, "04" : 31,
				"may" : 31, "5" : 31, "05" : 31,
				"jun" : 30, "june" : 30, "6" : 30, "06" : 30,
				"jul" : 31, "july" : 31, "7" : 31, "07" : 31,
				"aug" : 31, "august" : 31, "8" : 31, "08" : 31,
				"sep" : 30, "sept" : 30, "september" : 30, "9" : 30, "09" : 30,
				"oct" : 31, "october" : 31, "10" : 31,
				"nov" : 30, "november" : 30, "11" : 30,
				"dec" : 31, "december" : 31, "12" : 31
			}

	month_serial_no = {
						"jan" : 01, "january" : 01, "1" : 01, "01" : 01,
						"feb" : 02, "february" : 02, "2" : 02, "02" : 02,
						"mar" : 03, "march" : 03, "3" : 03, "03" : 03,
						"apr" : 04, "april" : 04, "4" : 04, "04" : 04,
						"may" : 05, "5" : 05, "05" : 05,
						"jun" : 06, "june" : 06, "6" : 06, "06" : 06,
						"jul" : 07, "july" : 07, "7" : 07, "07" : 07,
						"aug" : 8, "august" : 8, "8" : 8, "08" : 8,
						"sep" : 9, "sept" : 9, "september" : 9, "9" : 9, "09" : 9,
						"oct" : 10, "october" : 10, "10" : 10,
						"nov" : 11, "november" : 11, "11" : 11,
						"dec" : 12, "december" : 12, "12" : 12
					}

	if li[2] % 4 == 0 :
		days_in_months["feb"] = 29
		days_in_months["february"] = 29
		days_in_months["2"] = 29
		days_in_months["02"] = 29
	else:
		days_in_months["feb"] = 28
		days_in_months["february"] = 28
		days_in_months["2"] = 28
		days_in_months["02"] = 28

	date = str(li[2]) + "-" + str( month_serial_no[str(li[1].lower())] )
	
	if int(li[0]) > days_in_months[str(li[1].lower())]:
		li[0] = days_in_months[str(li[1].lower())]
	date = date + "-" + str( li[0] )

	return date

"""
Recognized date formats :-
1. 23/jul 	2. 23/Jul/2015 	3. 23/July 			4. 23/July/2015
2. 24-Sep	2. 24-Sep-2014	3. 24-SeptEmBer		4. 24-SepteMBer-2014
"""
def formatIfDate( item ):
	# print " @@@@ formatIfDate invoked"	# @@@p_change COMMENT
	try:
		li = item.split("/")

		if len(li) < 2 or len(li) > 3 :
			li = item.split("-")

		for i in range(0, len(li) ):
			li[i] = li[i].strip()

		month_list = [	"1", "01", "jan", "january", "2", "02", "feb", "february", "3", "03", "mar", "march",\
						"4", "04", "apr", "april", "5", "05", "may", "6", "06", "jun", "june", "7", "07", \
						"jul", "july","8", "08", "aug", "august", "9", "09", "sep", "sept", "september", \
						"10", "oct", "october", "11", "nov", "november", "12", "dec", "december" ]

		if ( len(li) == 2 or len(li) == 3 ):
			if li[1] in month_list or li[1].lower() in month_list :
				if li[0].isdigit() and int(li[0]) <= 31:	# changes go in here
					li[0] = int(li[0])
					
					try:
						if not ( li[2].isdigit() and len(li[2]) == 4 ) :
							return item
					except:
						li.append(datetime.now().year)
						print li

					try:
						li[2] = int( li[2] )		# converting the year to integer from string
					except:
						pass

					ret = convert2SqlDate( li )
					print "ret : "+ret
					return ret
	except:
		# pass
		print "@@@@ exception caught"

	return item 		# returns the item if the string is not date


def sanitizeInput( arr ):
	for i in range(0, len(arr) ):
		arr[i] = arr[i].strip()
		if arr[i].lower() == 'y' or arr[i].lower() == "yes":
			arr[i] = '1'
		elif arr[i].lower() == 'n' or arr[i].lower() == "no":
			arr[i] = '0'
		arr[i] = formatIfDate( arr[i].strip() )

	return arr

# converts python list to string
def list2Str( li ):
	if len(li) <= 0:
		return "()"
	elif len(li) == 1:
		return "(" + str(li[0]) + ")"

	ret = "( " + str(li[0])
	for i in li[1:]:
		ret = ret + ", " + str(i)
	ret = ret + ")"
	
	return ret

# converts list of values to string for sql insert queries
def valuesList2Str( li ):
	if len(li) <= 0:
		return "()"
	elif len(li) == 1:
		return "('" + str(li[0]) + "')"

	ret = "( '" + str(li[0]) + "'"
	for i in li[1:]:
		ret = ret + ", " + "'" + str(i) + "'"
	ret = ret + ")"
	
	return ret

# commits query to db
def executeInsertQuery( query ):
	db = MySQLdb.connect( config.host, config.user, config.password, config.db )

	cur = db.cursor()
	try:
		cur.execute( query )
		db.commit()
		cur.close()
		db.close()
		return True
	except:
		db.rollback()
		cur.close()
		db.close()
		return False

"""
prepares the query from list and pushes it for db insertion. 
Return value : True/False
"""
def push2Db( tablename, attributelist, valueslist ):
	attributestring = list2Str(attributelist)
	valuestring = valuesList2Str(valueslist)

	query = "INSERT INTO "+ tablename + attributestring +" VALUES"+valuestring
	print query
	# UNCOMMENT AFTER TESTING.
	return executeInsertQuery( query )

"""
Return Values :-
1. False : when select query execution fails
2. Tuple of mysql table rows, each row a tuple in itself
"""
def executeSelectQuery( query ):
	db = MySQLdb.connect( config.host, config.user, config.password, config.db )

	cur = db.cursor()
	try:
		cur.execute( query )
		res = cur.fetchall()
		return res
	except:
		cur.close()
		db.close()
		return False

def selectLatestIdQuery( tablename ):
	# query = "SELECT * FROM " + tablename + " WHERE id IN ( SELECT MAX(id) FROM "+ tablename + " )"
	query = "SELECT max(id) as max_id FROM " + tablename

	return query

def getLatestTblId( tablename ):
 	q = selectLatestIdQuery( tablename )
 	res = executeSelectQuery( q )
 	print "Latest entry : " + str(res[0][0])

 	return res[0][0]

def pushLineitem2DB( lineitem_name, module_ids_dict ):
	tmp_dict = {}
	attribute_names = ['name']
	attribute_values = [lineitem_name.strip()]
	# print "Table ids : ," + str(module_ids_dict)		# @@@p_change COMMENT
	for k,v in module_ids_dict.items() :
		tmp_dict[k.lower()+"_id"] = v
		attribute_names.append( k.lower()+"_id" )
		attribute_values.append( v )
	
	print "Attribute names : " + str(attribute_names) + ", attribute_values : " + str(attribute_values)
	res = push2Db( "lineitems", attribute_names, attribute_values )
	# print "attribute names with module ids : " + str(tmp_dict)		# @@@p_change COMMENT
	return getLatestTblId( "lineitems" )

def pushProjectLineitemMapping2DB( project_id, lineitem_id_list ):
	executionsuccess = True
	for it in lineitem_id_list :
		success_buffer = push2Db( config.tblprojects_lineitems_mapping, config.projects_lineitems_mappingAttrs, \
				[project_id, it, 1] )

		if success_buffer is False:
			executionsuccess = False

	return executionsuccess

def readCsv( filename ):
	linecount = 0
	
	# with open( config.parent_dir+"/"+filename, "r+" ) as inputfile :
	with open( filename, "r+" ) as inputfile :
		reader = csv.reader( inputfile )
		latest_tbl_ids = {}
		lineitem_id_list = []

		for row in reader:
			print "entered loop"
			linecount += 1
			print "******************  LINE NUMBER : "+str(linecount)+"  ******************"
			if linecount <= 4 or linecount == 6 :
				continue

			# Line #5 contains the overall project timeline. It treats the overall project as a lineItem.
			# Create a special lineItem name to represent/identify the whole project (especially in the DB)
			# CALL THE PUSH TO DB FUNCTION FOR EACH OF THE TABLE FIELDS BELOW
			if  linecount == 5 or linecount >= 7 :
				if linecount == 5 :
					project_name = row[1]
					lineitem_name = "_PROJECT_"
				elif linecount >= 7 :
					lineitem_name = row[1].strip()
				
				print "Line Item Name : "+lineitem_name
				
				BRDRequirementsRawValues = row[2:16]
				print "BRDRequirement fields : "+str(BRDRequirementsRawValues)
				BRDRequirementsValues = sanitizeInput(BRDRequirementsRawValues)
				print push2Db(config.tblBRDRequirements, config.BRDRequirementsAttrs, BRDRequirementsValues)
				print "post sanitization of fields : " + str( BRDRequirementsValues )
				latest_tbl_ids[config.tblBRDRequirements] = getLatestTblId( config.tblBRDRequirements )
				print "\n"

				TechDevNeedRawValues = row[16:24]
				print "TechDevNeed fields : "+str(TechDevNeedRawValues)
				TechDevNeedValues = sanitizeInput(TechDevNeedRawValues)
				print push2Db(config.tblTechDevNeed, config.TechDevNeedAttrs, TechDevNeedValues)
				print "post sanitization of fields : " + str( TechDevNeedValues )
				latest_tbl_ids[config.tblTechDevNeed] = getLatestTblId( config.tblTechDevNeed )
				print "\n"

				ContentNeedRawValues = row[24:32]
				print "ContentNeed fields : "+str(ContentNeedRawValues)
				ContentNeedValues = sanitizeInput(ContentNeedRawValues)
				push2Db(config.tblContentNeed, config.ContentNeedAttrs, ContentNeedValues)
				print "post sanitization of fields : " + str( sanitizeInput(ContentNeedRawValues) )
				latest_tbl_ids[config.tblContentNeed] = getLatestTblId( config.tblContentNeed )
				print "\n"

				TrainingNCommunicationPlanRawValues = row[32:43]
				print "TrainingNCommunicationPlan fields : "+str(TrainingNCommunicationPlanRawValues)
				TrainingNCommunicationPlanValues = sanitizeInput(TrainingNCommunicationPlanRawValues)
				push2Db(config.tblTrainingNCommunicationPlan, config.TrainingNCommunicationPlanAttrs, TrainingNCommunicationPlanValues)
				print "post sanitization of fields : " + str( TrainingNCommunicationPlanValues )
				latest_tbl_ids[config.tblTrainingNCommunicationPlan] = getLatestTblId( config.tblTrainingNCommunicationPlan )
				print "\n"

				CapabilitiesEnhancementRawValues = row[43:46]
				print "CapabilitiesEnhancement fields : "+str(CapabilitiesEnhancementRawValues)
				CapabilitiesEnhancementValues = sanitizeInput(CapabilitiesEnhancementRawValues)
				push2Db(config.tblCapabilitiesEnhancement, config.CapabilitiesEnhancementAttrs, CapabilitiesEnhancementValues)
				print "post sanitization of fields : " + str( CapabilitiesEnhancementValues )
				latest_tbl_ids[config.tblCapabilitiesEnhancement] = getLatestTblId( config.tblCapabilitiesEnhancement )
				print "\n"

				CostBenefitRawValues = row[46:51]
				print "CostBenefit fields : "+str(CostBenefitRawValues)
				CostBenefitValues = sanitizeInput(CostBenefitRawValues)
				push2Db(config.tblCostBenefit, config.CostBenefitAttrs, CostBenefitValues)
				print "post sanitization of fields : " + str( CostBenefitValues )
				latest_tbl_ids[config.tblCostBenefit] = getLatestTblId( config.tblCostBenefit )
				print "\n"

				RiskMitigationPlanRawValues = row[51:65]
				print "RiskMitigationPlan fields : "+str(RiskMitigationPlanRawValues)
				RiskMitigationPlanValues = sanitizeInput(RiskMitigationPlanRawValues)
				push2Db(config.tblRiskMitigationPlan, config.RiskMitigationPlanAttrs, RiskMitigationPlanValues)
				print "post sanitization of fields : " + str( RiskMitigationPlanValues )
				latest_tbl_ids[config.tblRiskMitigationPlan] = getLatestTblId( config.tblRiskMitigationPlan )
				print "\n"

				GoLivePlanRawValues = row[65:72]
				print "GoLivePlan fields : "+str(GoLivePlanRawValues)
				GoLivePlanValues = sanitizeInput(GoLivePlanRawValues)
				push2Db(config.tblGoLivePlan, config.GoLivePlanAttrs, GoLivePlanValues)
				print "post sanitization of fields : " + str( GoLivePlanValues )
				latest_tbl_ids[config.tblGoLivePlan] = getLatestTblId( config.tblGoLivePlan )
				print "\n"

				ClosureRawValues = row[72:74]
				print "Closure fields : "+str(ClosureRawValues)
				ClosureValues = sanitizeInput(ClosureRawValues)
				push2Db(config.tblClosure, config.ClosureAttrs, ClosureValues)
				print "post sanitization of fields : " + str( ClosureValues )
				latest_tbl_ids[config.tblClosure] = getLatestTblId( config.tblClosure )
				print "\n"

				# print "Latest table ids : " + str( latest_tbl_ids )		# @@@p_change COMMENT
				buf_id = pushLineitem2DB( lineitem_name, latest_tbl_ids )
				print "Latest lineitem id : " + str( buf_id )
				lineitem_id_list.append( buf_id )

		print "Loop ends. LINEITEM IDs : " + str(lineitem_id_list)
		# CODE REVIEW NEEDED. HASTILY DONE
		is_done = push2Db(config.tblprojects, config.projectsAttrs, [project_name, 1])

		if is_done:
			project_id = getLatestTblId( config.tblprojects )
			success1 = pushProjectLineitemMapping2DB( project_id, lineitem_id_list )
		
# fname = getCsvFileNames(config.parent_dir)
# if len(fname) == 1:
# 	readCsv( fname[1] )

# readCsv("GTM_Template_csv.csv")

files = getCsvFileNames( config.parent_dir )

for f in files:
	readCsv( config.parent_dir + "/" + f )

print "Python!! I'm done!!"

"""
Create success array/dictionary of all the DB commits/insertions. 
If atleast one commit fails, then 
	either disable , i.e. mark project as INACTIVE in DB
	or prompt for disabling the project.
"""
