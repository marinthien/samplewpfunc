<table>
    
    <tr>
        <td>Member ID</td>
        <td>Member FirstName</td>
        <td>Member LastName</td>
        
        
    </tr>
     <?php foreach($members as $member):?>
    <tr>
        <td><?php echo $member['MEMBER_ID'];?></td>
        <td><?php echo $member['FIRSTNAME'];?></td>
        <td><?php echo $member['LASTNAME'];?></td>
              
    </tr>
     <?php endforeach;?>
    
</table>


   
