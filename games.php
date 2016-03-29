<?php  ob_start();

// authentication check
require_once ('auth.php');

// set page title and embed header
$page_title = null;
$page_title = 'Video Game Listings';
require_once('header.php'); ?>

<h1>Video Games</h1>

<div class="col-sm-12 text-right">
    <form action="games.php" method="get" class="form-inline">
        <label for="keywords">Keywords:</label>
        <input name="keywords" id="keywords" />
        <select name="search_type" id="search_type">
            <option value="OR">Any Keyword</option>
            <option value="AND">All Keywords</option>
        </select>
        <button class="btn btn-primary">Search</button>
    </form>
</div>

<?php

// add an error handler in case anything breaks
//try {
    // connect
        require_once('db.php');

    // write the query to fetch the game data
        $sql = "SELECT * FROM games";

    // check for search keywords
    $word_list = null;
    $final_keywords = null;

    if (!empty($_GET['keywords'])) {
        $keywords = $_GET['keywords'];

        // convert the single value of the keywords to an array
        $word_list = explode(" ", $keywords);

        // start the where clause and initialize variables
        $sql .= " WHERE ";
        $where = "";
        $counter = 0;

        // check for OR / AND in search type dropdown
        $search_type = $_GET['search_type'];

        foreach ($word_list as $word) {
            // loop through the array of words
            if ($counter > 0) {
                $where .= " $search_type ";
            }

            $where .= " name LIKE ?";
            $word_list[$counter] = '%' . $word . '%';
            $counter++;
        }

        $sql .= $where;
    }

    // add order by at the end
    $sql .= " ORDER BY name";
    // echo $sql;

    // run the query and store the results into memory
        $cmd = $conn->prepare($sql);
        $cmd->execute($word_list);
        $games = $cmd->fetchAll();

    // start the table and add the headings
        echo '<table class="table table-striped table-hover sortable"><thead>
            <th><a href="#">Name</a></th>
            <th><a href="#">Age Limit</a></th>
            <th><a href="#">Release Date</a></th>
            <th><a href="#">Size</a></th>
            <th>Edit</th><th>Delete</th></thead><tbody>';

        /* loop through the data, creating a new table row for each game
        and putting each value in a new column */
        foreach ($games as $game) {
            echo '<tr><td>' . $game['name'] . '</td>
            <td>' . $game['age_limit'] . '</td>
            <td>' . $game['release_date'] . '</td>
            <td>' . $game['size'] . '</td>
            <td><a href="game.php?game_id=' . $game['game_id'] . '">Edit</a></td>
            <td>
            <a href="delete-game.php?game_id=' . $game['game_id'] .
                '" onclick="return confirm(\'Are you sure?\');">
                Delete</a></td></tr>';
        }

    // close the table
        echo '</tbody></table>';

    // disconnect
        $conn = null;
/*}
catch (Exception $e) {
    // send ourselves an email
    mail('georgian2015@hotmail.com', 'Games Listing Error', $e);

    // redirect to the error page
    header('location:error.php');
}
*/
echo '<script src="Scripts/sorttable.js"></script>';

// embed footer
require_once('footer.php');
ob_flush();
?>
