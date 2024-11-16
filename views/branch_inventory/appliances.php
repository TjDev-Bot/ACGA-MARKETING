<div class="col mb-2">
    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row">
                <div class="col d-flex p-2 align-items-center">
                    <!-- <a href="inventory.php" class="btn btn-outline-warning">
                                        <i class="fas fa-arrow-left"></i> Back
                                    </a> -->
                    <b class="text-warning"><?= $branch_name['branch_name'] ?> Inventory(Bansalan)...</b>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table align-items-center table-flush">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Product Code</th>
                        <th scope="col">Name</th>
                        <th scope="col">Category</th>
                        <th scope="col">Unit Price</th>
                        <th scope="col">Retail Price</th>
                        <th scope="col">Quantity</th>
                        <th class="text-success" scope="col">Date Created</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = $conn->query("SELECT * FROM branch_inventory WHERE inventory_type = '$branch' AND branch_name = 9 ORDER BY id DESC");
                    while ($row = $query->fetch_assoc()) {
                    ?>
                        <tr>
                            <td><?= $row['invoice_id'] ?></td>
                            <td><?= ucwords($row['name']) ?></td>
                            <td><?= ucwords($row['category_type']) ?></td>
                            <td>₱ <?= number_format($row['unit_price'], 2) ?></td>
                            <td>₱ <?= number_format($row['retail_price'], 2) ?></td>
                            <td><?= $row['quantity'] ?></td>
                            <td><?= date("M d, Y", strtotime($row['date_created'])) ?></td>
                            <td><span class="badge badge-success">Active</span></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>