<!DOCTYPE html>
<html lang="en">
<head>
<?php include("./head/meta.php"); ?>

<?php include("./includes.php"); ?>

</head>
<body>

<?php include("./preload.php"); ?>

<div class="sb—site—container">
<!-- Modal -->
<?php include("./head/header.php"); ?>
<?php include("./head/navbar.php"); ?>
<!-- content goes here -->



<?php

$index_no = 27;
$multi_arr = array(7, 11, 13, 18);

?>


<div class="wrapper">
    <!-- Sidebar  -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3 style="color: #fff">Code Project</h3>
        </div>

        <ul class="list-unstyled components">
            <!--<p>Dummy Heading</p>-->
            <?php

              $xml = simplexml_load_file("./database/db.xml");
              $i = 0;
              foreach ($xml->children() as $cnt) {
                echo "<li>\n";
                echo "\t<a class=\"". $i . "\" href=\"#\">".$cnt->title."</a>";
                echo "</li>";
                $i++;
              }

            ?>

        </ul>
    </nav>

    <!-- Page Content  -->
    <div id="content">


            <button type="button" id="sidebarCollapse" class="btn btn-info">
                <i class="fas fa-align-left"></i>
                <span>Toggle Sidebar</span>
            </button>
        </nav>


      <div class="articles w3-large">
        <div class="question"><h2><?php echo load_data("c", "title", $index_no); ?></h2></div><br>
        <div class="description"><strong>Description</strong><br>
          <?php echo load_data("c", "desc", $index_no); ?>
        </div>
        <div class="code-container container mt-3">
          <ul class="nav nav-tabs w3-border">
            <li class="nav-item">
              <a class="nav-link active" data-toggle="tab" href="#c_lang_1">C</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#cpp_lang_1">C++</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#java_lang_1">JAVA</a>
            </li>
          </ul>

          <!-- Tab panes -->
          <div class="tab-content">
            <div class="tab-pane active container" id="c_lang_1">
              <div class="code_area w3-light-grey">
              <pre id="code_containts">
                <code class="prettyprint devsite-code-highlight linenums">

<?php echo htmlentities(load_data("c", "code", $index_no)); ?>

             </code>
              </pre>
            </div>
              <div class="output w3-container w3-teal w3-pale-yellow w3-leftbar w3-border-yellow">
                <div class="output_head w3-large">OUTPUT</div>
                <div class="output_body w3-medium">
                  <pre style="padding-top: 0%; padding-bottom: 0%;">
<?php echo load_data("c", "out", $index_no); ?>
                  </pre>
                </div>
              </div>
            </div>
            <div class="tab-pane container" id="cpp_lang_1">
              <div class="code_area w3-light-grey">
              <pre id="code_containts">
                <code class="prettyprint lang-cpp linenums" id="cp">

<?php echo htmlentities(load_data("cpp", "code", $index_no)); ?>

                </code>
              </pre>
            </div>
              <div class="output w3-container w3-teal w3-pale-yellow w3-leftbar w3-border-yellow">
                <div class="output_head w3-large">OUTPUT</div>
                <div class="output_body w3-medium">
                  <pre style="padding-top: 0%; padding-bottom: 0%;">
<?php echo load_data("cpp", "out", $index_no); ?>
                  </pre>
                </div>
              </div>
            </div>
            <div class="tab-pane container" id="java_lang_1">
              <div class="code_area w3-light-grey">
              <pre id="code_containts">
                <code class="prettyprint lang-java linenums">

<?php echo htmlentities(load_data("java", "code", $index_no)); ?>

                </code>
              </pre>
            </div>
              <div class="output w3-container w3-teal w3-pale-yellow w3-leftbar w3-border-yellow">
                <div class="output_head w3-large">OUTPUT</div>
                <div class="output_body w3-medium">
                  <pre style="padding-top: 0%; padding-bottom: 0%;">
<?php echo load_data("java", "out", $index_no); ?>
                  </pre>
                </div>
              </div>
            </div>
          </div>


        </div>
      </div>






    </div>
</div>

<!-- jQuery CDN - Slim version (=without AJAX) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<!-- Popper.JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });
    });
</script>











<!-- content goes here -->
<?php include("./footer/mainfooter.php") ?>
<?php include("./footer/copyright.php") ?>

<?php include("./footer/bottomarrow.php") ?>
</div>
<!-- sb—site—container -->
<?php include("./leftnav/leftnav.php") ?>
<!-- sb—site—container -->

<script src="assets/js/plugins.min.js"></script>
<script src="assets/js/app.min.js"></script>
<script src="assets/js/configurator.min.js"></script>

<script src="assets/js/index.js"></script>
</body>

</html>





<?php


function load_data($f_name, $type, $pos) {




  $xml = simplexml_load_file("./database/db.xml");

  if ($xml == NULL) {
    return "";
  }

  $xml = $xml->content[$pos];

  if ($type == "title") {
    return load_cont($xml, $type);
  } elseif ($type == "desc") {
    return load_cont($xml, $type);
  } elseif ($f_name == "c") {
     return load_cont($xml->c_lang, $type);
  } elseif ($f_name == "cpp") {
    return load_cont($xml->cpp_lang, $type);
  } elseif ($f_name == "java") {
    return load_cont($xml->java_lang, $type);
  }

  return "";

}



function load_cont($xml, $type) {

  if ($type == "title") {
    return $xml->title;
  } elseif ($type == "desc") {
    return $xml->desc;
  } elseif ($type == "code") {
    return $xml->code;
  } elseif ($type == "out") {
    return $xml->out;
  }

  return "";

}





?>
