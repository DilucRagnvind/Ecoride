<div>

<form action="searchFormPost.php" method="POST">
    <div class=formDiv1>
        <label for="startingLocation">Adresse de départ:</label>
        <input type="text" name="startingLocation" required /> <br><br>
        <label for="startDate">Jour de départ:</label>
        <input type="date" name="startDate"  /> <br><br>
        <label for="timeStart">Heure de départ:</label>
        <input type="time" name="timeStart" /> <br><br>
    </div>
    <div class=formDiv1>
        <label for="endingLocation">Adresse d'arrivée:</label>
        <input type="text" name="endingLocation" required /> <br><br>
        <label for="endDate">Jour d'arrivée:</label>
        <input type="date" name="endDate"  /> <br><br>
        <label for="timeEnd">Heure d'arrivée:</label>
        <input type="time" name="timeEnd"  /> <br><br>
    </div>
<br><br>
    <button id="searchFormButton"type="submit">Valider</button><br><br>
</form>

    
  <!--   <div id=filter>
    <form action="searchFormPost.php" method="POST">
    <button id="filterButton"type="submit">Filtres</button>
        <label for="scoreMin">Note minimum : </label>
        <input type="number" name="scoreMin">
        <label for="maxPrice">Prix maximum : </label>
        <input type="number" name="maxPrice">
        <label for="maxTime">Durée maximum du trajet : </label>
        <input type="number" name="maxTime">
    </form>
    </div> -->
