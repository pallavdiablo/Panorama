import os, csv, shutil

csvDir = "csv"
srcDir = "dump"
destDir = "sorted"

input_csv_list = os.listdir(csvDir)
print "CSV files :",input_csv_list

def copy(tktId, dest = "sorted"):
	filelist = os.listdir("./"+srcDir)
	for fi in filelist:
		if tktId in fi:
			if not os.path.exists(dest+"/"+str(tktId)+"/"):
				os.makedirs(dest+"/"+str(tktId)+"/")
			try:
				print "TRY:",srcDir+"/"+fi, dest+"/"+str(tktId)+"/"+str(fi)
				shutil.copytree( srcDir+"/"+fi, dest+"/"+str(tktId)+"/"+str(fi) )
			except:
				try:
					print "EXCEPT-TRY:",srcDir+"/"+fi, dest+"/"+str(tktId)+"/"+str(fi)
					shutil.copy( srcDir+"/"+fi, dest+"/"+str(tktId)+"/"+str(fi) )
				except:
					print "EXCEPT-EXCEPT:",srcDir+"/"+fi, dest+"/"+str(tktId)+"/"+str(fi)
					print "Neither Directory nor file!!"
		print

for inputcsv in input_csv_list:
	print csvDir+"/"+inputcsv
	with open(csvDir+"/"+inputcsv, "r") as ic:
		reader = csv.reader(ic)
		for row in reader:
			copy(row[0], destDir)