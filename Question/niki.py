import sys
import csv

who = sys.argv[1]

who = int(who) + 10

x = [who]
print(str(x))

"""with open("ratings.csv",'a') as file:
	csv_file = csv.writer(file,delimiter=',')
	csv_file.writerow(x)"""

