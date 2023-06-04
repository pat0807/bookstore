<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Message</title>
</head>
<body>
<div class="main_content">
      <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
          <div class="col-md-12">
              <div class="card-body">
                <div class="mb-3 col-md-12" align=center>
                <table width=400 align=center border=1 bordercolor=#C6D7E7 cellspacing=0 cellpadding=0>
                <tr>
                  <td bgcolor=#C6D7E7>
                    Message
                  </td>
                </tr>
                <tr>
                <td bgcolor=white height=1></td>
                </tr>
                <tr>
                  <td bgcolor=white align=center height=150>
                    <p align=center><font color=#FF0000 size=3><?php echo $_GET["message"]; ?></font></p>
                  </td>
                </tr>
                <tr>
                <td bgcolor=white height=1></td>
                </tr>
                <tr>
                  <td align=right bgcolor=#C6D7E7>
                      | <a href="index.php">Home</a> |
                  </td>
                </tr>
                </table>
</body>
</html>