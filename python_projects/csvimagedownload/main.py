import urllib
import os
import utilities
import constants
import logging
import functions

log_filename =utilities.get_base_path() + "/" + constants.LOG_FOLDER + "/" + str(utilities.get_log_filename())
logging.basicConfig(filename = log_filename,level=logging.INFO)

excel_files = []
csv_files = []

excel_files = os.listdir(utilities.get_base_path() + "/" + constants.EXCEL_FOLDER)



for filename in excel_files :
	supc_string = ""
	supc_string = functions.read_excel(utilities.get_base_path() + "/" + constants.EXCEL_FOLDER + "/" + filename)
	csv_data = functions.get_csv_data(supc_string)
	functions.create_csv(csv_data)

csv_files = os.listdir(utilities.get_base_path() + "/" + constants.CSV_FOLDER)

for filename in csv_files :
	functions.download_images(utilities.get_base_path() + "/" + constants.CSV_FOLDER + "/" + filename)

