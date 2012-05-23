### dbConnect_LE

Object oriented database engine for WebsiteBaker and LEPTON CMS

#### Requirements

* minimum PHP 5.2.x
* using [WebsiteBaker] [1]
* _or_ using [LEPTON CMS] [2]

#### Installation

* download the actual [dbConnectLE_x.xx.zip] [3] installation archive
* in CMS backend select the file from "Add-ons" -> "Modules" -> "Install module"

#### First Steps

You can access the *dbConnect_LE* database engine from your own addons:

    if (!class_exists('dbconnectle')) {
      require_once WB_PATH.'/modules/dbconnect_le/include.php';
    }

Now you can use dbConnect to extend your own database object:

    class dbArticles extends dbConnectLE {    
      
      const FIELD_ID = 'article_id';
      const FIELD_NUMBER = 'article_number';
      const FIELD_NAME = 'article_name';
      const FIELD_TIMESTAMP = 'article_timestamp';
    
      private $createTable = false;
    
      /**
       * Constructor
       *
       * @param $createTable boolean
       */
      public function __construct($createTable = false) {
        $this->createTable = $createTable;
        parent::__construct();
        $this->setTableName('mod_articles');
        $this->addFieldDefinition(self::FIELD_ID, "INT(11) NOT NULL AUTO_INCREMENT", true);
        $this->addFieldDefinition(self::FIELD_NUMBER, "VARCHAR(64) NOT NULL DEFAULT ''");
        $this->addFieldDefinition(self::FIELD_NAME, "VARCHAR(64) NOT NULL DEFAULT ''");
        $this->addFieldDefinition(self::FIELD_TIMESTAMP, "TIMESTAMP");
        $this->setIndexFields(array(self::FIELD_NAME));
        $this->checkFieldDefinitions();
        // create table
        if ($this->createTable) {
          if (!$this->sqlTableExists()) {
            if (!$this->sqlCreateTable()) {
              $this->setError(sprintf('[%s - %s] %s', __METHOD__, __LINE__, $this->getError()));
            }
          }
        }
        // set timezone
        date_default_timezone_set(CFG_TIME_ZONE);
      } // __construct()
    
    } // class dbArticles

dbConnect_LE will do a lot of jobs in a smart way.

    $table = new dbArcticles(true);
    
Will create a new database object and will also create the needed MySQL table if it not exists.

    $article = array();
    $SQL = sprintf("SELECT * FROM %s WHERE `%s`='%d'",
      $dbOfferArticles->getTableName(),
      dbOfferArticles::FIELD_ID,
      $id);
    if (!$dbOfferArticles->sqlExec($SQL, $article)) {
      $this->setError(sprintf('[%s - %s] %s', __METHOD__, __LINE__, $dbOfferArticles->getError()));
      return false;
    }
    print_r($articles);
    
Will select the article with the specified $id from the table.

Please have a look to any add-on of phpManufaktur for WebsiteBaker or LEPTON CMS - you will find a lot of examples.          

[1]: http://websitebaker2.org "WebsiteBaker Content Management System"
[2]: http://lepton-cms.org "LEPTON CMS"
[3]: https://github.com/phpManufaktur/dbConnect_LE/downloads
