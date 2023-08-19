<?php include('header.php') ?>
<section>
    <h2>Select Data / Read Data</h2>

    <form action="." method="GET">
        <input type="hidden" name="action" value="select" />

        <label id="city">City name: </label>
        <input type="text" id="city" name="city" required /> 

        <button>Submit</button>
    </form>
</section>

<section>
    <h2>Insert Data / Create Data</h2>

    <form action="." method="POST">
        <input type="hidden" name="action" value="insert" />

        <label for="city">City name: </label>
            <input id="newCity" type="text" name="city" required />
        
        <label for="countrycode">Country code: </label>
            <input type="text" id="countrycode" name="countrycode" maxlength="3" required />
        
        <label for="district">District: </label>
            <input type="text" id="district" name="district" required />
        
        <label for="population">Population: </label>
            <input type="text" id="population" name="population" required />
        

        <button>Submit</button>
    </form>
</section>
<?php include('footer.php') ?>