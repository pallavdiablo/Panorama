host = "localhost"
user = "root"
password = "abcde"
db = "rds"

parent_directory = "files"

sellers_file = parent_directory+"/"+"sellers_csv.csv"
# sellers_table = "sellers_test"
sellers_table = "sellers"
attr_sellers = ["code", "name", "user_id", "email"]

brands_file = parent_directory+"/"+"brands_csv.csv"
# brands_table = "brands_test"
brands_table = "brands"
attr_brands = ["id", "name"]

categories_file = parent_directory+"/"+"categories_csv.csv"
#categories_table
categories_table = "categories"
attr_categories = ["id", "name"]

sub_categories_file = parent_directory+"/"+"sub_categories_csv.csv"
# sub_cats_table = "sub_categories_test"
sub_cats_table = "sub_categories"
attr_sub_cats = ["id", "name"]

subcat_brand_mapping_file = parent_directory+"/"+"subcat_brand_mapping.csv"
subcat_brand_mapping_table = "subcategory_brand_mapping"
attr_subcat_brand_mapping = ["subcategory_id", "subcategory_name", "brand_id", "brand_name"]

cat_subcat_mapping_file = parent_directory+"/"+"cat_subcat_mapping.csv"
cat_subcat_mapping_table = "category_subcategory_mapping"
attr_cat_subcat_mapping = ["category_id", "category_name", "subcategory_id", "subcategory_name"]

rules_file = parent_directory+"/"+"rules_csv.csv"
rules_table = "rules"
attr_rules_data = ["seller_code", "subcategory_id", "subcategory_name", "brand_id", "brand_name"]