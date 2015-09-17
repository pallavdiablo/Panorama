MYSQL_HOST = ""
MYSQL_USER = ""
MYSQL_PASS = ""
MYSQL_DB =  "snapdealdwh"
MYSQL_PORT = 3306

LOG_FOLDER = "logs"
CSV_FOLDER = "csv"
EXCEL_FOLDER = "excel"
IMAGE_FOLDER = "images"


QUERY = "SELECT dp.supc,concat('http://n4.sdlcdn.com/',pec.content_path) AS snapdeal_img_link from dwh.d_product dp JOIN cams_dwh.product_offer po ON dp.product_offer_id = po.id JOIN cams_dwh.product_external_content pec ON po.product_offer_content_id = pec.product_offer_content_id where dp.supc in (%s)"

