<?

/**
 * @param string
 **/

  function execute($cmd) {
   if (count($cmd) > 1) {
     $cmd = implode(" && ", $cmd);
   } $res = shell_exec($cmd);
   return $res;
  }

  function rrs($length = 6) {
      $string     = '';
      $vowels     = array("a","e","i","o","u");
      $consonants = array(
          'b', 'c', 'd', 'f', 'g', 'h', 'j', 'k', 'l', 'm',
          'n', 'p', 'r', 's', 't', 'v', 'w', 'x', 'y', 'z');
      srand((double) microtime() * 1000000);
      $max = $length/2;
      for ($i = 1; $i <= $max; $i++) {
        $string .= $consonants[rand(0,19)];
        $string .= $vowels[rand(0,4)];
      } return $string;
  }

  function writeLog($msg) {
      $li = "\r\n---------------------------------\r\n";
      echo $li.">      ".date("Y-m-d H:i:s")."      >".$li.$msg.$li;
  }

  function tryCommit($path = $_SERVER[PWD]) {
    try {
      $cmd = [
        "cd ".$path,
        "git status",
      ];
      $exec = execute($cmd);
      $exec = preg_match_all('/(not staged)|(modified:)/',$exec,$matches);
      if  ($exec==0) {
        throw new Exception("Нет изменений\r\n");
      } else {
        $name = rrs(rand(4,7)).' '.rrs(rand(5,6)).' '.rrs(rand(2,8));
        $cmd = [
          "cd ".$path,
          "git commit -am \"".$name."\"",
          "git push origin master",
        ];
        $xx = execute($cmd);
        writeLog($xx);
        }
    }
    catch (Exception $ex) {
      writeLog($ex);
    }
  }

  tryCommit();
  
