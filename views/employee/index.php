<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h1>Employeee form</h1>
        <hr>

        <form action="http://localhost/missionPhpMySql/database" method="POST">
            <div>
                <pre>
            <label>ID :            <input type="number" name="id" value="<?php echo $this->id ?>"></label>
                    <?php
                    if (isset($this->messages) && array_key_exists("id", $this->messages)) {
                        echo "<label>" . $this->messages["id"] . "</label>";
                    }
                    ?>
                </pre>
            </div>
            <div>
                <pre>
            <label>Employee name : <input type = "text" name = "name" value = "<?php echo $this->name ?>"></label><?php
                    if (isset($this->messages) && array_key_exists("name", $this->messages)) {
                        echo "<label>" . $this->messages["name"] . "</label>";
                    }
                    ?>
                </pre>
            </div>
            <div>
                <pre>

            <label>date :          <input type = "date" name = "hiredate" value = "<?php echo $this->hiredate ?>"></label><?php
                    if (isset($this->messages) && array_key_exists("hiredate", $this->messages)) {
                        echo "<label>" . $this->messages["hiredate"] . "</label>";
                    }
                    ?>
                </pre>
            </div>

            <input type = "submit" name = "action" value = "Create">
            <input type = "submit" name = "action" value = "update">
            <input type = "submit" name = "action" value = "GetAll">
            <input type = "submit" name = "action" value = "Get">
         

        </form>
        <div id = "content">
            <?php echo $this->content
            ?>
        </div>


    </body>
</html>

