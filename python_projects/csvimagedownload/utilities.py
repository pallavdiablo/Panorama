import datetime
import os

def get_date_time():
	return datetime.datetime.now().strftime("%d/%m/%g %H:%M:%S")

def get_log_filename():
	return "log" + str(datetime.datetime.now().strftime("_%d_%m_%g")) + ".log"

def get_csv_filename():
	return "CSV" + str(datetime.datetime.now().strftime("_%d_%m_%g_%H_%M_%S")) + ".csv"

def convert_list_to_string(input_list) :
	output_str = str(input_list)
	output_str = output_str.replace("[","")
	output_str = output_str.replace("]","")
	output_str = output_str.replace("u'","'")
	output_str = output_str.replace(".0","")
	return output_str

def get_base_path():
	return os.path.dirname(os.path.realpath(__file__))