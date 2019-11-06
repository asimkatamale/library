<div class="col-sm-8 text-left"> 
    <div class="row">
        <div class="col-lg-12">           
            <h2>Users List</h2>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email_id</th>
                    <th>Contact_no</th>
                 </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user) { ?>
                    <tr>
                        <td><?= $user->id ?></td>
                        <td><?= $user->name?></td>
                        <td><?= $user->email_id ?></td>
                        <td><?= $user->contact_no ?></td>
                        

                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

</div>
</div>
