<!DOCTYPE html>
<html>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
            crossorigin="anonymous"></script>
    <title>Users</title>
    <body>
    <table class="table table-striped">
        <tr>
            <th>id</th>
            <th>name</th>
            <th>email</th>
            <th>gender</th>
            <th>status</th>
            <th></th>
            <th></th>
        </tr>

        <?php foreach ($users as $user) :
            echo "<tr>";
            echo "<td>" . $user['id'] . "</td>";
            echo "<td>" . $user['name'] . "</td>";
            echo "<td>" . $user['email'] . "</td>";
            echo "<td>" . $user['gender'] . "</td>";
            echo "<td>" . $user['status'] . "</td>"; ?>
            <td>
                <?php echo '<div class="modal fade" id="updateModalToggle_' . $user["id"] . '" aria-hidden="true" tabindex="-1">' ?>
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalToggleLabel">Edit User</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="routes.php">
                                <input type="hidden" name="action" value="update"/>
                                <?php echo '<input type="hidden" name="id" value="' . $user["id"] . '" />' ?>
                                <div class="mb-3">
                                    <label for="inputName" class="form-label">Name</label>
                                    <?php echo '<input type="text" name="name" value="' . $user["name"] . '"
                                                class="form-control" id="inputName">'; ?>
                                </div>
                                <div class="mb-3">
                                    <label for="inputEmail" class="form-label">Email</label>
                                    <?php echo '<input type="email" name="email" class="form-control"
                                                       value="' . $user['email'] . '" id="inputEmail">'; ?>
                                </div>
                                <div class="mb-3">
                                    <label class="form-check-label" for="inputGender">Gender</label>
                                    <select class="form-select" id="inputGender" aria-label="gender" name="gender">
                                        <?php
                                        foreach ($genders as $key => $value):
                                            $selected = ($user['gender'] === $key) ? 'selected' : '';
                                            echo '<option ' . $selected . ' value="' . $key . '">' . $value . '</option>';
                                        endforeach;
                                        ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-check-label" for="inputStatus">Status</label>
                                    <select class="form-select" id="inputStatus" aria-label="status" name="status">
                                        <?php
                                        foreach ($statuses as $key => $value):
                                            $selected = ($user['status'] === $key) ? 'selected' : '';
                                            echo '<option ' . $selected . ' value="' . $key . '">' . $value . '</option>';
                                        endforeach;
                                        ?>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
                </div>
                <?php echo '<a class="btn btn-primary" data-bs-toggle="modal"
                                href="#updateModalToggle_' . $user["id"] . '" role="button">Edit User</a>' ?>
            </td>
            <td>
                <?php echo '<div class="modal fade" id="deleteModalToggle_' . $user["id"] . '"
                                 aria-hidden="true" tabindex="-1">' ?>
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalToggleLabel">Delete User</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure you want to delete that user?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                            <form method="post" action="routes.php">
                                <input type="hidden" name="action" value="delete"/>
                                <?php echo '<input type="hidden" name="id" value=' . $user["id"] . '/>'; ?>
                                <input class="btn btn-danger" type="submit" value="Delete"/>
                            </form>
                            </a>
                        </div>
                    </div>
                </div>
                </div>
                <?php echo '<a class="btn btn-danger" data-bs-toggle="modal"
                                href="#deleteModalToggle_' . $user["id"] . '" role="button">Delete</a>' ?>
            </td>
            <?php echo "</tr>";
        endforeach;
        ?>
    </table>
    <div class="modal fade" id="exampleModalToggle" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalToggleLabel">Fill Fields</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="routes.php">
                        <input type="hidden" name="action" value="add"/>
                        <div class="mb-3">
                            <label for="inputName" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" id="inputName"
                                   aria-describedby="Name">
                        </div>
                        <div class="mb-3">
                            <label for="inputEmail" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="inputEmail">
                        </div>
                        <div class="mb-3">
                            <label class="form-check-label" for="inputGender">Gender</label>
                            <select class="form-select" id="inputGender" aria-label="gender" name="gender">
                                <option>Select Gender</option>
                                <?php foreach ($genders as $key => $value):
                                    echo '<option value="' . $key . '">' . $value . '</option>';
                                endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-check-label" for="inputStatus">Status</label>
                            <select class="form-select" id="inputStatus" aria-label="status" name="status">
                                <option>Select Status</option>
                                <?php foreach ($statuses as $key => $value):
                                    echo '<option value="' . $key . '">' . $value . '</option>';
                                endforeach ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <a class="btn btn-primary" data-bs-toggle="modal" href="#exampleModalToggle" role="button">Add User</a>
    </body>
</html>