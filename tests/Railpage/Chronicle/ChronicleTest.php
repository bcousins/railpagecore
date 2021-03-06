<?php
	use Railpage\Chronicle\Chronicle;
	use Railpage\Chronicle\Entry;
	use Railpage\Chronicle\EntryType;
	use Railpage\Chronicle\Decade;
	use Railpage\Chronicle\Year;
	use Railpage\Users\User;
	
	class ChronicleTest extends PHPUnit_Framework_TestCase {
		
		/**
		 * EntryType
		 */
		
		public function testAddEntryType() {
			$EntryType = new EntryType; 
			
			$this->assertInstanceOf("Railpage\\Chronicle\\EntryType", $EntryType);
			
			$EntryType->text = "Test entry type";
			$EntryType->group = EntryType::GROUPING_LOCOS;
			$EntryType->commit(); 
		}
		
		public function testGetEntryType() {
			$EntryType = new EntryType(1);
			
			$this->assertEquals(1, $EntryType->id);
			$this->assertEquals("Test entry type", $EntryType->text);
			$this->assertEquals(EntryType::GROUPING_LOCOS, $EntryType->group);
		}
		
		public function testUpdateEntryType() {
			$EntryType = new EntryType(1);
			
			$EntryType->text = "Test entry type updated to Locations";
			$EntryType->group = EntryType::GROUPING_LOCATIONS;
			
			$updated_name = $EntryType->text;
			$updated_desc = $EntryType->group;
			
			$EntryType->commit(); 
			
			// Reload the operator
			$EntryType = new EntryType(1);
			
			$this->assertEquals($updated_name, $EntryType->text);
			$this->assertEquals($updated_desc, $EntryType->group);
		}
		
		/**
		 * Entry
		 */
		
		public function testAddEntry() {
			$Entry = new Entry; 
			
			$this->assertInstanceOf("Railpage\\Chronicle\\Entry", $Entry);
			
			/**
			 * Create a new User object 
			 */
			
			$User = new User;
			$User->username = "phpunit";
			$User->contact_email = "phpunit@website.com";
			$User->provider = "railpage";
			$User->setPassword("thisisnotmypassword");
			$User->commit(); 
			
			$Entry->setAuthor($User);
			$Entry->Date = new DateTime("1988-02-18");
			$Entry->blurb = "A test chronicle entry";
			$Entry->text = "A test chronicle entry descriptive text";
			$Entry->EntryType = new EntryType(1);
			$Entry->commit(); 
			
		}
		
		public function testGetEntry() {
			$Entry = new Entry(1);
			
			$this->assertEquals(1, $Entry->id);
			$this->assertEquals("A test chronicle entry", $Entry->blurb);
			$this->assertEquals("A test chronicle entry descriptive text", $Entry->text);
			$this->assertEquals("18th February 1988", $Entry->Date->format("jS F Y"));
		}
		
		public function testUpdateEntry() {
			$Entry = new Entry(1);
			
			$Entry->blurb = "blurb";
			$Entry->text = "text";
			$Entry->Date = new DateTime("1989-04-28");
			
			$updated_blurb = $Entry->blurb;
			$updated_text = $Entry->text;
			
			$Entry->commit(); 
			
			// Reload the operator
			$Entry = new Entry(1);
			
			$this->assertEquals($updated_blurb, $Entry->blurb);
			$this->assertEquals($updated_text, $Entry->text);
			$this->assertEquals("28th April 1989", $Entry->Date->format("jS F Y"));
		}
		
		public function test_getEntriesForDate() {
			$Chronicle = new Chronicle;
			
			$Entry = new Entry;
			$User = new User(1);
			
			$Entry->setAuthor($User);
			$Entry->Date = new DateTime("1970-02-18");
			$Entry->blurb = "A test chronicle entry";
			$Entry->text = "A test chronicle entry descriptive text";
			$Entry->EntryType = new EntryType(1);
			$Entry->commit(); 
			
			$Date = new DateTime("28th April 1989");
			
			foreach ($Chronicle->getEntriesForDate($Date) as $Entry) {
				$this->assertEquals(1, $Entry->id);
				$this->assertEquals($Date->format("Y-m-d"), $Entry->Date->format("Y-m-d"));
			}
		}
		
		/**
		 * Decade
		 */
		
		public function test_newDecade() {
			$Decade = new Decade(1988);
			
			$this->assertInstanceOf("Railpage\\Chronicle\\Decade", $Decade);
			
			$this->assertEquals(1980, $Decade->decade);
		}
		
		/**
		 * Year
		 */
		
		public function test_newYear() {
			$Year = new Year(1997);
			$Decade = $Year->getDecade();
			
			$this->assertInstanceOf("Railpage\\Chronicle\\Year", $Year);
			
			$this->assertEquals(1997, $Year->year);
			$this->assertEquals(1990, $Decade->decade);
		}
	}
?>