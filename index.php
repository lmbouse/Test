<?php
/*****************************************
 *                PANACEA                *
 *              INDEX  PAGE              *
 *                                       *
 *=======================================*
 *                                       *
 *   DEVELOPED BY: LEANA BOUSE           *
 *   LAST UPDATED: 11/8/2012             *
 * ..................................... *
 *                                       *
 * INCLUDED FILES:                       *
 *   header.php                          *
 *   footer.php                          *
 *   common.php                          *
 *   lang.php                            *
 *                                       *
 *****************************************/
 
  /********************
   * GENERAL INCLUDES *
   ********************/
  include 'includes/common.php';
  include 'includes/lang.php'; 
   
  /****************
   * Declarations *
   ****************/
  $pageTitle = $lang['Site_name'] . $lang['Index_title'];
  $root = '';

  /*************************************
   * CSS INCLUDES TO BE USED IN HEADER *
   *************************************/
  $cssA = '<link rel="stylesheet" type="text/css" href="'.$root.'css/main-layout.css">';
  $cssB = '<link rel="stylesheet" type="text/css" href="'.$root.'css/index-layout.css">';
  $cssIncludes = array($cssA, $cssB);

  /******************
   * OTHER INCLUDES *
   ******************/
  include 'header.php';
?>

        <div id="sidebar">
          <div class="ranks">
            <div class="ranks-header">PLAYER RANKS</div><!--END div.ranks-header-->
            <div class="ranks-list">
            <table width="100%">
			<tr class="l-odd"><th>RANK</th><th>NAME</th><th>LEVEL</th></tr>

            </table>
			</div><!--END div.ranks-list-->
        </div><!--END div.ranks-->
        </div><!--END div.sidebar-->


         <div id="content">
             <div class="news">
                 <div class="news-header"></div>
                 <div class="news-entries">
                </div><!--END div.news-entries-->
            </div><!--END div.news-->
 
       </div><!--END div.content-->

<?php

  /*******************/
 /* FOOTER INCLUDES */
/*******************/
    include 'footer.php';

?>