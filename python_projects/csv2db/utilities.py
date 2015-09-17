

# convert each row to sql string
def dict2String( d, attr ) :
	ro = "("
	for k in attr:
		v = d[k]
		if v and v!="" and not v.isspace():
			ro += ('\"'+str(v)+'\"')
			ro += ","
		else :
			ro += "NULL"
			ro += ","
	ro = ro[0:-1]+")"
	return ro


# convert list of value rows to into strings for sql insertions.
# 'attr' list is passed to access the dictionary elements in a specific order
def list2SqlArray( li, attr ):
	if len(li) <= 0:
		return False
	elif len(li) == 1:
		return dict2String(li[0], attr)
	else:
		sql_arr = dict2String(li[0], attr)
		for it in li[1:]:
			xyz = dict2String(it, attr)
			sql_arr = sql_arr+","+str(xyz)
		# sql_arr += ")"
		return sql_arr
