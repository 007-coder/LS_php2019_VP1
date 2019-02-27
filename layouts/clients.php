<h1>clients <?php echo (count($VDclients)) ? ' ('.count($VDclients).') ' : ''; ?></h1>

<?php if (count($VDclients)) { ?>  
  <table width="100%">
    <thead>      
      <th width="2%">user_id</th>      
      <th width="15%">email</th>      
    </thead>
    <tbody>
      <?php foreach ($VDclients as $clients) { ?>
        <tr>
          <?php foreach ($clients as $oc => $ocVal) { ?>
            <td><?php echo $ocVal ?></td>
          <?php } ?>          
        </tr>
      <?php } ?>
    </tbody>
  </table> 
<?php } else { ?>
  <h2 class="text-center">No clients</h2>
<?php } ?>