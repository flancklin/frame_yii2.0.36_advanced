# frame_yii2.0.36_advanced_byfile简写为app

# 一、migrate(创建table)

### 1、在cli命令窗口：

* 找到app中有yii得目录。此处为：.../app/yii
* 在yii目录运行`php yii migate/create    表名`  回车，(如果php设定了全局变量可省)

### 2、这时app/console/migrations目录下就会多一个文件

> ```php
> <?php
> 
> use yii\db\Migration;
> 
> /**
>  * Class m200815_023359_create_pre_xyz
>  */
> class m200815_023359_create_pre_xyz extends Migration
> {
>     public function safeUp()
>     {
> 
>     }
> 
>     /**
>      * {@inheritdoc}
>      */
>     public function safeDown()
>     {
>         echo "m200815_023359_create_pre_xyz cannot be reverted.\n";
> 
>         return false;
>     }
> 
>     /*
>     // Use up()/down() to run migration code without a transaction.
>     public function up()
>     {
> 
>     }
> 
>     public function down()
>     {
>         echo "m200815_023359_create_pre_xyz cannot be reverted.\n";
> 
>         return false;
>     }
>     */
> }
> 
> ```

### 3、在文件中safeUp()方法中写表字段

> ```php
> <?php
> 
> use yii\db\Migration;
> 
> /**
>  * Class m200815_023359_create_pre_xyz
>  */
> class m200815_023359_create_pre_xyz extends Migration
> {
>     private $tableName = "{{%xyz}}";
>     /**
>      * {@inheritdoc}
>      */
>     public function safeUp()
>     {
>         $this->createTable($this->tableName, [
>             'id' => $this->primaryKey(),
> //            'id2' =>$this->bigPrimaryKey(),
>             'a11' => $this->char(),
>             'a12' => $this->string(),
>             'a13' => $this->text(),
>             'a14' => $this->tinyInteger(),
>             'a15' => $this->smallInteger(),
>             'a16' => $this->integer(),
>             'a17' => $this->bigInteger(),
>             'a18' => $this->float(),
>             'a19' => $this->double(),
>             'a20' => $this->decimal(),
>             'a21' => $this->money(),
>             'a22' => $this->dateTime(),
>             'a23' => $this->timestamp(),
>             'a24' => $this->time(),
>             'a25' => $this->date(),
>             'a26' => $this->binary(),
>             'a27' => $this->boolean(),
> //            'a28' => $this->json(),//mysql5.7才支持
>             'test' => $this->integer()->notNull()->defaultValue(0)->comment('备注')
>         ],' ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 ');
> 
>         $this->createIndex('index_xy', $this->tableName, ['a16', 'a20']);
>         $this->insert($this->tableName,['a11'=>'1','a12'=>'12']);
> 
> 
> /*上面执行后的sql语句
> CREATE TABLE `pre_xyz`  (
>   `id` int(11) NOT NULL AUTO_INCREMENT,
>   `a11` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
>   `a12` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
>   `a13` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
>   `a14` tinyint(3) NULL DEFAULT NULL,
>   `a15` smallint(6) NULL DEFAULT NULL,
>   `a16` int(11) NULL DEFAULT NULL,
>   `a17` bigint(20) NULL DEFAULT NULL,
>   `a18` float NULL DEFAULT NULL,
>   `a19` double NULL DEFAULT NULL,
>   `a20` decimal(10, 0) NULL DEFAULT NULL,
>   `a21` decimal(19, 4) NULL DEFAULT NULL,
>   `a22` datetime(0) NULL DEFAULT NULL,
>   `a23` timestamp(0) NULL DEFAULT NULL,
>   `a24` time(0) NULL DEFAULT NULL,
>   `a25` date NULL DEFAULT NULL,
>   `a26` blob NULL,
>   `a27` tinyint(1) NULL DEFAULT NULL,
>   `test` int(11) NOT NULL DEFAULT 0 COMMENT '备注',
>   PRIMARY KEY (`id`) USING BTREE,
>   INDEX `index_xy`(`a16`, `a20`) USING BTREE
> ) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;
> 
> INSERT INTO `pre_xyz` VALUES (1, '1', '12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0);
> 
> * */
> /*
>     //需要继承重写的
>     $this->up();$this->safeUp();
>     $this->down();$this->safeDown();
>     //表级别操作
>     $this->createTable();
>     $this->dropTable();
>     $this->renameTable();
>     $this->truncateTable();
>     $this->addCommentOnTable();
>     $this->dropCommentFromTable();
>     //索引操作
>     $this->createIndex();
>     $this->dropIndex();
>     //主键
>     $this->primaryKey();
>     $this->bigPrimaryKey();
>     $this->addPrimaryKey();
>     $this->dropPrimaryKey();
>     //外键
>     $this->addForeignKey();
>     $this->dropForeignKey();
>     //字段
>     $this->addColumn();
>     $this->dropColumn();
>     $this->renameColumn();
>     $this->alterColumn();
>     $this->addCommentOnColumn();
>     $this->dropCommentFromColumn();
>     //记录
>     $this->insert();
>     $this->batchInsert();
>     $this->upsert();
>     $this->update();
>     $this->delete();
> */
>     }
> 
>     /**
>      * {@inheritdoc}
>      */
>     public function safeDown()
>     {
>         $this->dropTable($this->tableName);
>         echo "m200815_023359_create_pre_xyz cannot be reverted.\n";
> 
>         return false;
>     }
> 
>     /*
>     // Use up()/down() to run migration code without a transaction.
>     public function up()
>     {
> 
>     }
> 
>     public function down()
>     {
>         echo "m200815_023359_create_pre_xyz cannot be reverted.\n";
> 
>         return false;
>     }
>     */
> }
> ```

### 4、在cli命令窗口。输入`php yii migrate`