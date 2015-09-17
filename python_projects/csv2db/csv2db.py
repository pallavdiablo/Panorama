import utilities
from utilities import list2SqlArray
import MySQLdb
import csv
import config
import os


# execute insertion queries
def executeInsertQuery( query ):
	db = MySQLdb.connect( config.host, config.user, config.password, config.db);
	cur = db.cursor()
	print "QUERIES LIST : ", query
	
	try:
		if type(query) is str:
			cur.execute(query)
		elif type(query) is list:
			for iter1 in query:
				cur.execute(iter1)
		else:
			cur.execute( query )
		print "Insert queries executed"
		db.commit()
		print "Changes committed to DB"
		success = True
	except:
		print "Query commit failed"
		db.rollback()
		success = False

	cur.close()
	db.close()
	return success


def executeQuery( query ): 
	db = MySQLdb.connect( config.host, config.user, config.password, config.db);
	cur = db.cursor()
	try:
		array_of_results = []
		if type( query ) is list:
			for iter2 in query:
				res_buf = []
				cur.execute(iter2)
				for res_row in cur.fetchall():
					res_buf.append(res_row)
				array_of_results.append(res_buf)
	except:
		print "Query execution failed.."
		array_of_results = False

	cur.close()
	db.close()
	return array_of_results


"""
NAMING CONVENTIONS :-
1. populate<TableNameAcronym>Tbl()	=>	Populates the table whose acronym is used. Query execution implemented by 
										invoking commit<TableNameAcronym>2DB()
2. commit<TableNameAcronym>2DB		=>	Executes the insertion query. Invoked by populate<TableNameAcronym>Tbl()
"""

def commitSellers2DB( sellers_details_buffer_list ):
	print "\n\nCalling list2SqlArray function : converts list to sql array string "
	sellers_string_val = list2SqlArray(sellers_details_buffer_list, config.attr_sellers)
	print "***Stringified seller_details_array : ",sellers_string_val

	q_insert_sellers = "INSERT INTO "+config.sellers_table+"(code, name, user_id, email) VALUES "+sellers_string_val+\
									" ON DUPLICATE KEY UPDATE is_valid = 1 "
	
	try:
		status_ret = executeInsertQuery(q_insert_sellers)
	except:
		print "Insertion Failed. Call to executeInsertQuery encountered exception"
		status_ret = False
		raw_input("Enter to continue : ")

	return status_ret


def populateSellersTbl():
	count = 1
	recount = 1
	sellers_details_list = []

	with open( config.sellers_file, "r+" ) as ifile:
		reader = csv.reader(ifile)
		for row in reader:
			if count == 1:
				count += 1
				continue
			seller_buf = {'code' : row[0], 'name' : row[1], 'user_id' : row[2], 'email' : row[3] }
			sellers_details_list.append(seller_buf)

			print count," :\t",row[0]," -- ",row[1]," -- ",row[2]," -- ",row[3]#," -- ",row[8]
			count += 1
			recount += 1
			if recount > 1000:
				recount = recount % 1000
				commitSellers2DB( sellers_details_list )
				sellers_details_list = []
				print "***************RECOUNTER reset**********"
		commitSellers2DB( sellers_details_list )


def commitCategories2DB( categories_buffer_list ):
	categories_string_val = list2SqlArray(categories_buffer_list, config.attr_categories)

	q_insert_categories = "INSERT INTO "+config.categories_table+"(id, name) VALUES "+categories_string_val+\
										" ON DUPLICATE KEY UPDATE is_valid = 1 "

	try:
		status_ret = executeInsertQuery( q_insert_categories )
	except:
		print "Insertion into Categories table failed.. Exception in executeInsertQuery function"
		status_ret = False
		raw_input("Enter to continue : ")

	return status_ret


def populateCategoriesTbl():
	count = 1
	recount = 1
	categories_list = []

	with open( config.categories_file, "r+" ) as ifile:
		reader = csv.reader(ifile)
		for row in reader:
			if count == 1:
				count += 1
				continue
			categories_buf = {'id' : row[0], 'name' : row[1]}
			categories_list.append(categories_buf)

			print count," :\t",row[0]," -- ",row[1]#," -- ",row[3]," -- ",row[0]," -- ",row[8]
			count += 1
			recount += 1
			if recount > 1000:
				recount = recount % 1000
				commitCategories2DB( categories_list )
				categories_list = []
				print "***************RECOUNTER reset**********"
		commitCategories2DB( categories_list )


def commitSubCats2DB( sub_cats_buffer_list ):
	sub_cats_string_val = list2SqlArray(sub_cats_buffer_list, config.attr_sub_cats)

	q_insert_sub_cats = "INSERT INTO "+config.sub_cats_table+"(id, name) VALUES "+sub_cats_string_val+\
										" ON DUPLICATE KEY UPDATE is_valid = 1 "

	try:
		status_ret = executeInsertQuery( q_insert_sub_cats )
	except:
		print "Insertion into Sub-Categories table failed.. Exception in executeInsertQuery function"
		status_ret = False
		raw_input("Enter to continue : ")

	return status_ret


def populateSubCatsTbl():
	count = 1
	recount = 1
	sub_cats_list = []

	with open( config.sub_categories_file, "r+" ) as ifile:
		reader = csv.reader(ifile)
		for row in reader:
			if count == 1:
				count += 1
				continue
			sub_cat_buf = {'id' : row[0], 'name' : row[1]}
			sub_cats_list.append(sub_cat_buf)

			print count," :\t",row[0]," -- ",row[1]#," -- ",row[3]," -- ",row[0]," -- ",row[8]
			count += 1
			recount += 1
			if recount > 1000:
				recount = recount % 1000
				commitSubCats2DB( sub_cats_list )
				sub_cats_list = []
				print "***************RECOUNTER reset**********"
		commitSubCats2DB( sub_cats_list )


def commitBrands2DB( brands_buffer_list ):
	brands_string_val = list2SqlArray(brands_buffer_list, config.attr_brands)

	q_insert_brands = "INSERT INTO "+config.brands_table+"(id, name) VALUES "+brands_string_val+\
										" ON DUPLICATE KEY UPDATE is_valid = 1 "

	try:
		status_ret = executeInsertQuery( q_insert_brands )
	except:
		print "Insertion into Brands table failed.. Exception in executeInsertQuery function"
		status_ret = False
		raw_input("Enter to continue : ")

	return status_ret


def populateBrandsTbl():
	count = 1
	recount = 1
	brands_list = []

	with open( config.brands_file, "r+" ) as ifile:
		reader = csv.reader(ifile)
		for row in reader:
			if count == 1:
				count += 1
				continue
			brand_buf = { 'id' : row[0], 'name' : row[1]}
			brands_list.append(brand_buf)
			print count," :\t",row[0]," -- ",row[1]#," -- ",row[3]," -- ",row[0]," -- ",row[8]
			count += 1
			recount += 1
			if recount > 1000:
				recount = recount % 1000
				commitBrands2DB( brands_list )
				brands_list = []
				print "***************RECOUNTER reset**********"
		commitBrands2DB( brands_list )


def commitSubcatBrandMapping2DB( subcat_brand_map_buffer_list ):
	print "\n\nCalling list2SqlArray function : converts list to sql array string "
	subcat_brand_mapping_string_val = list2SqlArray(subcat_brand_map_buffer_list, config.attr_subcat_brand_mapping)
	print "***Stringified seller_details_array : ",subcat_brand_mapping_string_val

	q_insert_subcat_brand_mapping = "INSERT INTO "+config.subcat_brand_mapping_table+"(subcategory_id, subcategory_name, brand_id, brand_name) VALUES "+subcat_brand_mapping_string_val+\
													" ON DUPLICATE KEY UPDATE is_valid = 1 "
	"""print q_insert_sellers
	"""

	try:
		status_ret = executeInsertQuery(q_insert_subcat_brand_mapping)
	except:
		print "Insertion Failed. Call to executeInsertQuery encountered exception"
		status_ret = False
		raw_input("Enter to continue : ")

	return status_ret


def populateSubcatBrandMappingTbl():
	count = 1
	recount = 1
	subcat_brand_mapping_list = []

	with open( config.subcat_brand_mapping_file, "r+" ) as ifile:
		reader = csv.reader(ifile)
		for row in reader:
			if count == 1:
				count += 1
				continue
			mapping_buf = {'subcategory_id' : row[0], 'subcategory_name' : row[1], 'brand_id' : row[2], 'brand_name' : row[3] }
			subcat_brand_mapping_list.append(mapping_buf)

			print count," :\t",row[0]," -- ",row[1]," -- ",row[2]," -- ",row[3]#," -- ",row[8]
			count += 1
			recount += 1
			if recount > 1000:
				recount = recount % 1000
				commitSubcatBrandMapping2DB( subcat_brand_mapping_list )
				subcat_brand_mapping_list = []
				print "***************RECOUNTER reset**********"
				# break
		commitSubcatBrandMapping2DB( subcat_brand_mapping_list )


def commitCatSubcatMapping2DB( cat_subcat_map_buffer_list ):
	print "\n\nCalling list2SqlArray function : converts list to sql array string "
	cat_subcat_mapping_string_val = list2SqlArray(cat_subcat_map_buffer_list, config.attr_cat_subcat_mapping)
	print "***Stringified seller_details_array : ",cat_subcat_mapping_string_val

	q_insert_cat_subcat_mapping = "INSERT INTO "+config.cat_subcat_mapping_table+"(category_id, category_name, subcategory_id, subcategory_name) VALUES "+cat_subcat_mapping_string_val+\
										" ON DUPLICATE KEY UPDATE is_valid = 1 "
	
	try:
		status_ret = executeInsertQuery(q_insert_cat_subcat_mapping)
	except:
		print "Insertion Failed. Call to executeInsertQuery encountered exception"
		status_ret = False
		raw_input("Enter to continue : ")

	return status_ret


def populateCatSubcatMappingTbl():
	count = 1
	recount = 1
	cat_subcat_mapping_list = []

	with open( config.cat_subcat_mapping_file, "r+" ) as ifile:
		reader = csv.reader(ifile)
		for row in reader:
			if count == 1:
				count += 1
				continue
			mapping_buf = {'category_id' : row[0], 'category_name' : row[1], 'subcategory_id' : row[2], 'subcategory_name' : row[3] }
			cat_subcat_mapping_list.append(mapping_buf)

			print count," :\t",row[0]," -- ",row[1]," -- ",row[2]," -- ",row[3]#," -- ",row[8]
			count += 1
			recount += 1
			if recount > 1000:
				recount = recount % 1000
				commitCatSubcatMapping2DB( cat_subcat_mapping_list )
				cat_subcat_mapping_list = []
				print "***********RECOUNTER reset**********"
				# break
		commitCatSubcatMapping2DB( cat_subcat_mapping_list )


def commitRules2DB( rules_buffer_list ):
	rules_string_val = list2SqlArray(rules_buffer_list, config.attr_rules_data)

	q_rules = "INSERT INTO "+config.rules_table+ \
						"(seller_code, subcategory_id, subcategory_name, brand_id, brand_name) VALUES "+\
						rules_string_val+\
						" ON DUPLICATE KEY UPDATE is_valid = 1 "

	try:
		status_ret = executeInsertQuery( q_rules )
	except:
		print "Insertion into Brands table failed.. Exception in executeInsertQuery function"
		status_ret = False
		raw_input("Enter to continue : ")

	return status_ret


def populateRulesTbl():
	count = 1
	recount = 1
	rules_list = []

	with open( config.rules_file, "r+" ) as ifile:
		reader = csv.reader(ifile)
		for row in reader:
			if count == 1:
				count += 1
				continue

			# id=-1	=> NULL id
			# name = "_dummy_1"	=> NULL name
			if row[1]=='' or row[1]==' ':
				row[1]="-1" 
			if row[2]=='' or row[2]==' ':
				row[2]="_dummy_1"
			if row[3]=='' or row[3]==' ':
				row[3]="-1"
			if row[4]=='' or row[4]==' ':
				row[4]="_dummy_1"

			rules_buf = {'seller_code':row[0], 'subcategory_id':row[1], 'subcategory_name':row[2], \
								'brand_id':row[3], 'brand_name':row[4]}
			rules_list.append(rules_buf)
			print count," :\t",rules_buf
			count += 1
			recount += 1
			if recount > 1000:
				recount = recount % 1000
				commitRules2DB( rules_list )
				rules_list = []
				print "***********RECOUNTER reset**********"
				# break
		commitRules2DB( rules_list )


count = 1
recount = 1

file_list = os.listdir("files/")

if config.sellers_file.split("/")[1] in file_list :
	print "Sellers data exists. Going to execute populateSellersTbl"
	populateSellersTbl()
if config.brands_file.split("/")[1] in file_list :
	print "Brands data exists. Going to execute populateBrandsTbl"
	populateBrandsTbl()
if config.categories_file.split("/")[1] in file_list :
	print "Categories data exists. Executing populateCategoriesTbl"
	populateCategoriesTbl()
if config.sub_categories_file.split("/")[1] in file_list:
	print "SubCategories data exists. Executing populateSubCatsTbl"
	populateSubCatsTbl()
if config.subcat_brand_mapping_file.split("/")[1] in file_list:
	print "subcat_brand mapping data exits. Executing populateSubcatBrandMappingTbl"
	populateSubcatBrandMappingTbl()
if config.cat_subcat_mapping_file.split("/")[1] in file_list :
	print "cat_subcat mapping data exists. Executing populateCatSubcatMappingTbl"
	populateCatSubcatMappingTbl()
if config.rules_file.split("/")[1] in file_list:
	print "Rules data exists. Executing populateRulesTbl"
	populateRulesTbl()

print "csv2db executed"