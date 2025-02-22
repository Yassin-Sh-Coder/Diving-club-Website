<!DOCTYPE html>
<html>

<body>


  <div>
    <div>
      <h3>Insert a new guide</h3>
    </div>
    <form action="admin.php" method="POST">
      <div>
        <div>
          <label for="first_name">First Name</label>
          <input type="text" name="first_name" placeholder="Enter First Name">
        </div>
        <div>
          <label for="last_name">Last Name</label>
          <input type="text" name="last_name" placeholder="Enter Last Name">
        </div>
        <div>
          <label for="exampleInputFile">Photo input</label>
          <div>
            <div>
              <input type="file" name="exampleInputFile">
              <label for="exampleInputFile">Choose file (jpg)</label>
            </div>
            <div>
              <input type="submit" name="new_guide" value="Create Guide">
            </div>
          </div>
        </div>

      </div>
    </form>
  </div>



      <?php
          require 'conn.php';
          if (isset($_POST['new_guide'])) {
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            

            $query = "INSERT INTO guides (first_name, last_name) VALUES ('$first_name', '$last_name')";
            $result = mysqli_query($conn, $query);

            if ($result) {
              echo "New guide added successfully";
            } else {
              echo "Error: " . $query . "<br>" . mysqli_error($connection);
            }
            mysqli_close($conn);
          }
        ?>

      <div>
          <h3>Insert a new event</h3>
          <form action="admin.php" method="POST">
            <div>
              <label for="category">Category</label>
              <select id="category" name="category">
                <?php
                require 'conn.php';
                $query = "SELECT * FROM events_categories";
                $result = mysqli_query($conn, $query);

                while ($row = mysqli_fetch_assoc($result)) {
                  echo "<option value='" . $row['category_id'] . "'>" . $row['name'] . "</option>";
                }
                mysqli_close($conn);
                ?>
              </select>
            </div>
            <div>
              <label for="description">Description</label>
              <textarea id="description" name="description" placeholder="Enter Description"></textarea>
            </div>
            <div>
              <label for="name">Name</label>
              <input type="text" id="name" name="name" placeholder="Enter Name">
            </div>
            <div>
              <label for="destination">Destination</label>
              <input type="text" id="destination" name="destination" placeholder="Enter Destination">
            </div>
            <div>
              <label for="date_from">Date From</label>
              <input type="date" id="date_from" name="date_from">
            </div>
            

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                  var dateFromInput = document.getElementById('date_from');
                  var today = new Date().toISOString().split('T')[0];
                  dateFromInput.setAttribute('min', today);
                });
                document.addEventListener('DOMContentLoaded', function() {
                  var dateFromInput = document.getElementById('date_to');
                  var today = new Date().toISOString().split('T')[0];
                  dateFromInput.setAttribute('min', today);
                });
            </script>

            <div>
              <label for="date_to">Date To</label>
              <input type="date" id="date_to" name="date_to">
            </div>
            <div>
              <label for="cost">Cost</label>
              <input type="number" id="cost" name="cost" placeholder="Enter Cost">
            </div>
            <div>
              <span>Guide</span>
              <input type="text" id="first_name" name="first_name" placeholder="First Name">
              <input type="text" id="last_name" name="last_name" placeholder="Last Name">
            </div>
            <div>
              <label for="photo">Photo</label>
              <input type="file" id="photo" name="photo">
            </div>
            <div>
              <input type="submit" name="new_event" value="Create Event">
            </div>
          </form>
      </div>

      <?php
      require 'conn.php';

      if (isset($_POST['new_event'])) {
        $category = $_POST['category'];
        $description = $_POST['description'];
        $name = $_POST['name'];
        $destination = $_POST['destination'];
        $date_from = $_POST['date_from'];
        $date_to = $_POST['date_to'];
        $cost = $_POST['cost'];
        $guide_first_name = $_POST['first_name'];
        $guide_last_name = $_POST['last_name'];
        
        echo "<script>alert('$category')</script>";
        if ($category == "Drift Diving"){
          $category = 1;
        } else if ($category == "Deep Diving"){
          $category = 2;
        }

        $query = "INSERT INTO events (category_id, description, name, destination, date_from, date_to, cost) VALUES ('$category', '$description', '$name', '$destination', '$date_from', '$date_to', '$cost')";
        $result = mysqli_query($conn, $query);

        
        if ($result) {
          echo "New event added successfully";
        } else {
          echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }

        $query2 = "SELECT guide_id FROM guides WHERE first_name = '$guide_first_name' AND last_name = '$guide_last_name'"; 
        $result2 = mysqli_query($conn, $query2);
        $query3 = "SELECT event_id FROM events WHERE name = '$name'";
        $result3 = mysqli_query($conn, $query3);

        if ($result2 && $result3) {
          $guide_id = mysqli_fetch_assoc($result2)['guide_id'];
          $event_id = mysqli_fetch_assoc($result3)['event_id'];

          $query4 = "INSERT INTO event_guides (event_id, guide_id) VALUES ('$event_id', '$guide_id')";
          $result4 = mysqli_query($conn, $query4);

          if ($result4) {
            echo "Event and guide relationship added successfully";
          } else {
            echo "Error: " . $query4 . "<br>" . mysqli_error($conn);
          }
        } else {
          echo "Error: " . $query2 . "<br>" . mysqli_error($conn);
        }
        mysqli_close($conn);
      }
      ?>
      
</body>


</html>