<?php
	require_once('Site_Common_Battery_Test.php');

	class Site_Main_Test extends MultiSiteIslandoraWebTestCase {

		function Site_Main_Test() {
			# Set site name
			$this->setMultiSite('');
			echo "<p></p><hr><h3>TESTING: " . $this->getTestingUrlBase() . "</h3>";
		}

		#############################################################
		# Test Basics and Specific Pages
		#############################################################

		function TestSiteBasics() {
			$this->doStandardBasicSiteTests();
		}

		function TestStartAProject() {
			$this->get(FULL_APP_URL . '/start-a-project');
			$this->standardResponseChecks();
		}

		function TestProjectLeads() {
			$this->fail("IMPROVEMENT IDEA: Change path 'project-leads' to 'discover-collections'?"); // also change TestDiscoverCollections
			$this->get(FULL_APP_URL . '/project-leads');
			$this->standardResponseChecks();
		}

		function TestFAQ() {
			$this->fail("IMPROVEMENT IDEA: Change path '/node/6' to '/faq'?");
			$this->get(FULL_APP_URL . '/node/6');
			$this->standardResponseChecks();
		}

		#############################################################
		# Test Solution Packs
		#############################################################

		function Test_SolutionPacks_Begin() {
			echo "<p><strong>Testing Solution Packs</strong></p>";
			echo "<ul>";
		}

		function TestContentModelDisplay_Audio() {
			$this->doContentModelTest_Audio('', 'grinnell', '10942');
		}

		function TestContentModelDisplay_BasicImage() {
			$this->doContentModelTest_BasicImage('', 'grinnell', '10737');
		}

		function TestContentModelDisplay_Binary() {
			$this->doContentModelTest_Binary('', 'grinnell', '10511');
		}

		function TestContentModelDisplay_Book() {
			$this->doContentModelTest_Book('', 'grinnell', '5317');
		}

		function TestContentModelDisplay_Compound() {
			$this->doContentModelTest_Compound('', 'grinnell', '5263');
		}

		function TestContentModelDisplay_LargeImage() {
			$this->doContentModelTest_LargeImage('', 'grinnell', '5281');
		}

		function TestContentModelDisplay_PDF() {
			$this->doContentModelTest_PDF('', 'grinnell', '5272');
		}

		function TestContentModelDisplay_Video() {
			$this->doContentModelTest_Video('', 'grinnell', '4933');
		}

        // function TestContentModelDisplay_OralHistory() {
        //    $this->doContentModelTest_OralHistory('', 'grinnell', '19509');
        // }

		function Test_SolutionPacks_End() {
			echo "</ul>";
		}

		#############################################################
		# Test Collections and Objects (this site only)
		#############################################################

		function TestAccessibility_Collection_And_Object() {
			# array elements: ['collection_id', 'object_id']
			$array_collection_and_object_ids = [
				['grinnell:studio-student-art', 'grinnell:20629'],
				['grinnell:phpp', 'grinnell:20619'],
				['grinnell:postcards', 'grinnell:20601'],
				['grinnell:faculty-scholarship', 'grinnell:20234'],
				['grinnell:college-life', 'grinnell:20182'],
				['grinnell:alumni-oral-histories', 'grinnell:19526'],
				['grinnell:student-scholarship', 'grinnell:19508'],
				['grinnell:archives-suppressed', 'grinnell:19436'],
				['grinnell:curricular-materials', 'grinnell:19112'],
				['grinnell:grinnell-in-china', 'grinnell:18749'],
				['grinnell:jimmy-ley', 'grinnell:18741'],
				['grinnell:social-gospel', 'grinnell:18375'],
				['grinnell:ancient-coins', 'grinnell:17339'],
				['grinnell:geology', 'grinnell:17236'],
				['grinnell:geology-suppressed', 'grinnell:17234'],
				['grinnell:gwcc', 'grinnell:12427'],
				['grinnell:kleinschmidt', 'grinnell:12228'],
				['grinnell:college-buildings', 'grinnell:11807'],
				['grinnell:college-history', 'grinnell:11782'],
				['grinnell:faulconer', 'faulconer-art:6480'],
				['grinnell:faulconer-suppressed', 'faulconer-art:6457'],
				['grinnell:recent-art-acquisitions', 'faulconer-art:6573'],
				['grinnell:soviet-graphic-art', 'faulconer-art:3199']
			];

			$this->doTestSite_Collections_and_Objects($array_collection_and_object_ids);
		}

		#############################################################
		# Test Search and Facets
		#############################################################

		function TestSearch_Type() {
			$this->get(FULL_APP_URL . '/islandora/search?f[0]=dc.type%3A%22Physical%5C%20Object%22');
			$this->standardResponseChecks();
		}

		function TestSearch_Facets() {
			$this->get(FULL_APP_URL . '/islandora/search/z?type=dismax'); // hack to return smaller resultset to avoid timeout
			//$this->get(FULL_APP_URL . '/islandora/search/'); // this causes timeout: too much data for simpletest to parse
			//$this->get(FULL_APP_URL . '/islandora/search?f[0]=dc.type%3A%22Physical%5C%20Object%22'); // hack to return smaller resultset to avoid timeout
			//$this->get(FULL_APP_URL . '/islandora/search/%20?islandora_solr_search_navigation=0'); // hack to return smaller resultset to avoid timeout
			$this->assertPattern('/<div class="islandora-solr-facet-wrapper"><h3>Collection<\\/h3>/i');
			$this->assertPattern('/<div class="islandora-solr-facet-wrapper"><h3>Name<\\/h3>/i');
			$this->assertPattern('/<div class="islandora-solr-facet-wrapper"><h3>Department or Group<\\/h3>/i');
			$this->assertPattern('/<div class="islandora-solr-facet-wrapper"><h3>Type<\\/h3>/i');
			$this->assertPattern('/<div class="islandora-solr-facet-wrapper"><h3>Subject<\\/h3>/i');
			$this->assertPattern('/<div class="islandora-solr-facet-wrapper"><h3>Geographic<\\/h3>/i');
			$this->assertPattern('/<div class="islandora-solr-facet-wrapper"><h3>Language<\\/h3>/i');
		}

		#############################################################
		# Utility Tool: Flush content to keep browser alive
		#############################################################
		function Test_Utility_KeepBrowserAlive() {
			$this->util_KeepBrowserAlive_Flush(); // prevent browser timeout issues
		}

	}