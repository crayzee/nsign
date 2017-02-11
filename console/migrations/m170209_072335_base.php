<?php

use yii\db\Migration;

class m170209_072335_base extends Migration
{
    public function up()
    {
			
			$this->createTable('component', [
				'id' => $this->primaryKey(),
				'name' => $this->string(70),
				'is_hidden' => $this->boolean()->defaultValue(false),
			], 'ENGINE=InnoDB CHARSET=utf8' );
			
            $this->createIndex(
                'ui-component',
                'component',
                'name',
                true
            );
            
			$this->insert('component', array( "id" => "1", "name" => "Сахар", "is_hidden" => false, ));
			$this->insert('component', array( "id" => "2", "name" => "Соль", "is_hidden" => false, ));
			$this->insert('component', array( "id" => "3", "name" => "Яйца", "is_hidden" => false, ));
			$this->insert('component', array( "id" => "4", "name" => "Мука", "is_hidden" => false, ));
			$this->insert('component', array( "id" => "5", "name" => "Творог", "is_hidden" => true, ));
			$this->insert('component', array( "id" => "6", "name" => "Молоко", "is_hidden" => false, ));
			$this->insert('component', array( "id" => "7", "name" => "Сода", "is_hidden" => false, ));
			$this->insert('component', array( "id" => "8", "name" => "Масло", "is_hidden" => false, ));
			$this->insert('component', array( "id" => "9", "name" => "Ванилин", "is_hidden" => false, ));
			$this->insert('component', array( "id" => "10", "name" => "Кефир", "is_hidden" => false, ));
			$this->insert('component', array( "id" => "11", "name" => "Яблоки", "is_hidden" => true, ));
			$this->insert('component', array( "id" => "12", "name" => "Сливки", "is_hidden" => false, ));
			
			$this->createTable('product', [
				'id' => $this->primaryKey(),
				'name' => $this->string(70),
			], 'ENGINE=InnoDB CHARSET=utf8');			
			
            $this->createIndex(
                'ui-product',
                'product',
                'name',
                true
            );
            
			$this->insert('product', array( "id" => "1", "name" => "Блины", ));
			$this->insert('product', array( "id" => "2", "name" => "Яичница", ));
			$this->insert('product', array( "id" => "3", "name" => "Сырники", ));
			$this->insert('product', array( "id" => "4", "name" => "Шарлотка", ));
			
			
			$this->createTable('product_component', [
				'id' => $this->primaryKey(),
				'product_id' => $this->integer()->notNull(),
				'component_id' => $this->integer()->notNull(),
			], 'ENGINE=InnoDB CHARSET=utf8');			
			
			// add foreign key for table `product_component`
			$this->addForeignKey(
				'fk-product',
				'product_component',
				'product_id',
				'product',
				'id',
				'CASCADE'
			);
			
			// add foreign key for table `product_component`
			$this->addForeignKey(
				'fk-component',
				'product_component',
				'component_id',
				'component',
				'id',
				'CASCADE'
			);
            
            $this->createIndex(
                'ui-product_component',
                'product_component',
                ['product_id','component_id'],
                true
            );
			
			$this->insert('product_component', array( "id" => "1", "product_id" => 1, "component_id" => 1 ));
			$this->insert('product_component', array( "id" => "2", "product_id" => 1, "component_id" => 2 ));
			$this->insert('product_component', array( "id" => "3", "product_id" => 1, "component_id" => 3 ));
			$this->insert('product_component', array( "id" => "4", "product_id" => 1, "component_id" => 4 ));
			$this->insert('product_component', array( "id" => "5", "product_id" => 1, "component_id" => 6 ));
			$this->insert('product_component', array( "id" => "6", "product_id" => 1, "component_id" => 9 ));
			$this->insert('product_component', array( "id" => "7", "product_id" => 2, "component_id" => 2 ));
			$this->insert('product_component', array( "id" => "8", "product_id" => 2, "component_id" => 3 ));
			$this->insert('product_component', array( "id" => "9", "product_id" => 2, "component_id" => 8 ));
			$this->insert('product_component', array( "id" => "10", "product_id" => 3, "component_id" => 5 ));
			$this->insert('product_component', array( "id" => "11", "product_id" => 4, "component_id" => 1 ));
			$this->insert('product_component', array( "id" => "12", "product_id" => 4, "component_id" => 4 ));
			$this->insert('product_component', array( "id" => "13", "product_id" => 4, "component_id" => 11 ));
    }

    public function down()
    {
			
				$this->delete( 'product_component',"id = '13'" );
				$this->delete( 'product_component',"id = '12'" );
				$this->delete( 'product_component',"id = '11'" );
				$this->delete( 'product_component',"id = '10'" );
				$this->delete( 'product_component',"id = '9'" );
				$this->delete( 'product_component',"id = '8'" );
				$this->delete( 'product_component',"id = '7'" );
				$this->delete( 'product_component',"id = '6'" );
				$this->delete( 'product_component',"id = '5'" );
                $this->delete( 'product_component',"id = '4'" );
                $this->delete( 'product_component',"id = '3'" );
                $this->delete( 'product_component',"id = '2'" );
                $this->delete( 'product_component',"id = '1'" );
			
          $this->dropIndex(
                'ui-product_component',
                'product_component'
            );
            
				// drops foreign key for table `product_component`
        $this->dropForeignKey(
            'fk-component',
            'product_component'
        );
				
				// drops foreign key for table `product_component`
        $this->dropForeignKey(
            'fk-product',
            'product_component'
        );

        $this->dropTable('product_component');
				
				$this->delete( 'product',"id = '4'" ); 
				$this->delete( 'product',"id = '3'" ); 
				$this->delete( 'product',"id = '2'" ); 
				$this->delete( 'product',"id = '1'" ); 
            $this->dropIndex(
                'ui-product',
                'product'
            );
        $this->dropTable('product');
				
				$this->delete( 'component',"id = '12'" );
				$this->delete( 'component',"id = '11'" );
				$this->delete( 'component',"id = '10'" );
				$this->delete( 'component',"id = '9'" );
				$this->delete( 'component',"id = '8'" );
				$this->delete( 'component',"id = '7'" );
				$this->delete( 'component',"id = '6'" );
				$this->delete( 'component',"id = '5'" );
				$this->delete( 'component',"id = '4'" );
				$this->delete( 'component',"id = '3'" );
				$this->delete( 'component',"id = '2'" );
				$this->delete( 'component',"id = '1'" );
          $this->dropIndex(
                'ui-component',
                'component'
            );
        $this->dropTable('component');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
