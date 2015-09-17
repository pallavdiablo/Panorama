import os
import csv

files = os.listdir("csv")

for fi in files:
	with open("csv/"+fi, "r+") as f:
		reader = csv.reader(f)
		for row in reader:
			if not os.path.exists("folder/"+row[0]):
				os.makedirs("folder/"+row[0])
				