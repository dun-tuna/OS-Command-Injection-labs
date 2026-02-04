<?php 
   $command = 'ping';  
   $blacklist = ['cat', 'ls', 'tail', 'head','more', 'less', 'nc', 'bash', '&&', '|', '`', '<', '>', '&'];
   if(isset($_POST['target'])){
      $target = $_POST['target'];
      foreach($blacklist as $item) {
         if(stripos($target, $item) !== false) {
            die("Hack detected.");
         }
      }
      // Remove spaces to prevent simple command chaining
      $target = str_replace(' ', '', $target);
      $target = str_replace(['/','\\'], '', $target);
      $result = shell_exec("$command -c 4 $target 2>&1");
   }
?>
<!DOCTYPE html>
<html> 
<head>
    <title>Ping Utility </title>
</head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.5.2/sketchy/bootstrap.min.css" integrity="sha384-RxqHG2ilm4r6aFRpGmBbGTjsqwfqHOKy1ArsMhHusnRO47jcGqpIQqlQK/kmGy9R" crossorigin="anonymous">
    <linl rel="stylesheet" href="https://getbootstrap.com/docs/4.0/examples/cover/cover.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js" integrity="sha512-WNLxfP/8cVYL9sj8Jnp6et0BkubLP31jhTG9vhL/F5uEZmg5wEzKoXp1kJslzPQWwPT1eyMiSxlKCgzHLOTOTQ==" crossorigin="anonymous"></script>
    <style>
        pre {
    white-space: pre-wrap;       /* Since CSS 2.1 */
    white-space: -moz-pre-wrap;  /* Mozilla, since 1999 */
    white-space: -pre-wrap;      /* Opera 4-6 */
    white-space: -o-pre-wrap;    /* Opera 7 */
    word-wrap: break-word;       /* Internet Explorer 5.5+ */
}
    </style>
</head>
<body>
<div class="container">
    <div class="page-header" id="banner">
        <div class="row">
            <div class="col-lg-12">
                    <h1 class="cover-heading">Command Injection Level3</h1>
                    <form action="#" method="POST" id="frm_tool">
                    <select name=command>
                        <option value="ping">ping</option>
                    </select>
                        <input type=text name=target />
                        <button class="btn btn-primary">check</button>
                    </form>
                    <pre id=result>
                <?php 
                    if(isset($_POST['target'])) {
                        echo htmlspecialchars($result); 
                    } else {
                        echo "Enter target and click Check";
                    }
                ?>
                    </pre>
            </div>
        </div>
    </div>
</div>
</body>