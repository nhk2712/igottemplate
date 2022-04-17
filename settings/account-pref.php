<div class="list-group">
    <a href="changeava" class="list-group-item list-group-item-action"><?php echo $changeAva;?></a>
    <a href="rename" class="list-group-item list-group-item-action"><?php echo $changeUsername;?></a>
    <a href="changepass" class="list-group-item list-group-item-action"><?php echo $changePass;?></a>
    <div style="border:2px solid red;padding:20px;border-radius: 0px 0px 5px 5px">
        <h5 style="color:red"><?php echo $danger;?></h5>
        <a href="delacc.php"><button type="button" class="btn btn-outline-danger"><?php echo $delAcc;?></button></a><br/>
    </div>
</div>