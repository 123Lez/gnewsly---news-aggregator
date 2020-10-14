import newspaper
from newspaper import news_pool
from DB_connection import database_connection
import pymysql
class ScraperMethods:
    def __init__(self,mysql):
        self.mysql = mysql
        # # mysql = database_connection('localhost','root','','social_news_db')
        self.mysql.get_connection()

    def sources(self):
        replies = list()
        qry = 'SELECT * from sources'
        qry_result = self.mysql.query_data(qry)

        if len(qry_result) > 0:
            for result in qry_result:
                replies.append(result[1])

        return replies

    def build_sources(self,param):
        replies = list()
        categories = self.get_categories()
        for sources in param:
            replies.append(newspaper.build('http://' + str(sources) + '.com', language='en'))
            for category in categories:
                # replies.append(newspaper.build('http://'+str(sources)+'.com/'+category,language='en', memoize_articles = True))
                replies.append(newspaper.build('http://' + str(sources) + '.com/' + category, language='en'))

        news_pool.set(replies, threads_per_source=3)
        news_pool.join()

        return replies

    def extracting_source(self,param):
        replies = list()
        category = ''
        # for sources in param:
        # sources = newspaper.build('http://CNN.com',memoize_articles = False)

        #testing purposes
        for sources in param:
            if sources.size() > 0:
                for article in sources.articles:

                    try:
                        if article.url.find("/entertainment") != -1:
                            category = '1'

                        elif article.url.find("/business") != -1:
                            category = '2' 

                        elif article.url.find("/travel") != -1:
                            category = '3'

                        elif article.url.find("/sport") != -1:
                            category = '4'

                        elif article.url.find("/technology") != -1:
                            category = '5'

                        else:
                            category = '6'

                        article.download()
                        article.parse()
                        replies.append({sources.brand:{'authors':article.authors,'publish_date':article.publish_date,
                            'text':article.text,'top_image':article.top_image,'category':category,
                            'logo_url':'','title':article.title,'all_images':list(article.images),
                            'article_url':article.url,'video_url':article.movies}})

                        #Enter all the data fetched into the DB
                        self.add_data_to_db(replies)
                        print('Download of article was successful')





                    except newspaper.article.ArticleException:
                        print('Unable to download the article')

        return replies


    def add_data_to_db(self, param):
        for source_brand in param:
            for item,value in source_brand.items():

                try:
                    qry = "INSERT INTO sources_content(id,source_id,authors,publish_date,article_text,top_image,"\
                        "category,logo_url,title,all_images,article_url,video_url)"\
                        "VALUE(NULL,(SELECT id from sources WHERE source = %s),%s,%s,%s,%s,%s,%s,%s,%s,%s,%s)"

                    if len(value['authors'])==0:
                        value['authors']='NULL'

                    if value['publish_date']==None:
                        value['publish_date']='NULL'

                    if len(value['authors']) == 0:
                        value['authors']=' '

                    if value['publish_date']==None:
                        value['publish_date']=''

                    if value['text']=='':
                        value['text']=' '

                    if value['top_image']=='':
                        value['top_image']=' '

                    if value['category']=='':
                        value['category']=' '

                    if value['logo_url']=='':
                        value['logo_url']=' '

                    if value['title']=='':
                        value['title']=' '

                    if len(value['all_images']) == 0:
                        value['all_images']='[]'

                    if value['article_url']=='':
                        value['article_url']=' '


                    if len(value['video_url']) == 0:
                        value['video_url']='[]'

                    qry_result = (item,str(value['authors']),value['publish_date'],value['text'],
                        value['top_image'],value['category'],value['logo_url'],value['title'],str(value['all_images']),
                        value['article_url'],str(value['video_url']))

                    result = self.mysql.query_data(qry,qry_result)

                    #if the DB contains duplicates then remove
                    self.remove_duplicates(value['title'])
                    print('Entered data in the database successfully')

                except pymysql.err.InternalError:
                    print('Failed to enter data in the database')


    def remove_duplicates(self,title):
        replies = list()
        self.qry = "SELECT * FROM sources_content WHERE title = %s"
        self.qry_param = title
        self.qry_result = self.mysql.query_data(self.qry,self.qry_param)

        if len(self.qry_result) > 1:
            self.delete_qry = "DELETE FROM sources_content WHERE title = %s AND " \
                              "id != %s"
            self.del_qry_param = (self.qry_param,self.qry_result[0][0])
            result = self.mysql.query_data(self.delete_qry, self.del_qry_param)


    def get_categories(self):
        replies = list()
        self.qry = "SELECT * FROM category"
        self.qry_result = self.mysql.query_data(self.qry)

        for result in self.qry_result:
            replies.append(result[1])

        return replies






