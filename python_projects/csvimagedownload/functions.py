import logging
import constants
import MySQLdb
import urllib
import xlrd
import utilities
import csv


def get_csv_data(supcs) :

	try:
		connection = MySQLdb.connect(constants.MYSQL_HOST,constants.MYSQL_USER,constants.MYSQL_PASS,constants.MYSQL_DB,constants.MYSQL_PORT)
		scrape_db = connection.cursor()
		scrape_db.execute('SET NAMES utf8;') 
		scrape_db.execute('SET CHARACTER SET utf8;')
		scrape_db.execute('SET character_set_connection=utf8;')
	except Exception as e:
		logging.info("Error Connecting to database while getting get_data_for_mail............")
		return
	try :
		
		query = constants.QUERY % (supcs)
		print query
		output_list = []
		scrape_db.execute(query)
		logging.info("query is " + query)
		result = scrape_db.fetchall()
		
		if (len(result) != 0) :
			for i in range (0 , len(result)) :
				output_list.append(result[i][0])
				output_list.append(result[i][1])
		
		return output_list

		connection.close()
		
		
	except Exception as e:
		logging.info(e)
		logging.info("query is " + query)
		logging.info("Error executing the query on database while getting get_data_for_mail...........")
		connection.commit()
		connection.close()
		return output_list




def download_images(filename):
	with open("{0}".format(filename), 'r') as csvfile:
	# iterate on all lines
		i = 0
		for line in csvfile:
			splitted_line = line.split(',')
		# check if we have an image URL
			if splitted_line[1] != '' and splitted_line[1] != "\n":
				urllib.urlretrieve("http://" + str(splitted_line[1]), utilities.get_base_path() + "/" + constants.IMAGE_FOLDER + "/" + splitted_line[0] + "_"+  str(i) + ".jpg")
				i += 1
				if(i%500 == 0):
					print i
				
			else:
				print "No result for {0}".format(splitted_line[0])






def read_excel(filename) :
	logging.info("going to read : %s" % (filename))
	supclist = []
	try :
		book = xlrd.open_workbook(filename)
		sheet = book.sheet_by_index(0)
	except Exception as e :
		logging.info("Error while opening the sheet from file "+filename)
		logging.info(e)
		print e
		return
		
	nrows = sheet.nrows
	if nrows > 1 :
		for i in range(0,nrows) :
			supclist.append(sheet.cell_value(i,0))
	return utilities.convert_list_to_string(supclist)


def create_csv(input_list) :
	try :
		logging.info("creating csv")
		myfile = open(utilities.get_base_path() + "/" + constants.CSV_FOLDER + "/" + utilities.get_csv_filename(), 'wb')
		wr = csv.writer(myfile)

		for i in range (0, len(input_list)/2) :
			index = i*2
			temp_list = [input_list[index],input_list[index+1]]
			wr.writerow(temp_list)
		logging.info("csv created successfully")
	except Exception as e:
		logging.info(e)

