<h1>orders <?php echo (count($VDorders)) ? ' ('.count($VDorders).') ' : ''; ?></h1>

<?php if (count($VDorders)) { ?>
  <table width="100%">
    <thead>
      <th width="1.5%">id</th>
      <th width="2%">user_id</th>
      <th width="20%">comment</th>
      <th width="15%">name</th>
      <th width="10%">phone</th>
      <th width="15%">email</th>
      <th width="15%">street</th>
      <th width="1.5%">home</th>
      <th width="1.5%">part</th>
      <th width="1.5%">appt</th>
      <th width="1.5%">floor</th>
      <th width="1.5%">payment</th>
      <th width="1.5%">callback</th>
    </thead>
    <tbody>
      <?php foreach ($VDorders as $orders) { ?>
        <tr>
          <?php foreach ($orders as $ok => $oVal) { ?>
            <td><?php echo $oVal ?></td>
          <?php } ?>          
        </tr>
      <?php } ?>
    </tbody>
  </table>  
<?php } else { ?>
  <h2 class="text-center">No orders</h2>
<?php } ?>
