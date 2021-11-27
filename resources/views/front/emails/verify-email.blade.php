<style>
    .container {
        margin: 20px auto;
        padding: 15px 10px;
        border: 1px grey solid;
        border-radius: 5px;
        max-width: 600px;
        overflow-wrap: break-word;
    }

    .container h1 {
        font-size: 1.7em;
        text-align: center;
        line-height: 2em;
    }

    .container p {
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        font-size: 1em;
        line-height: 1.2em;
        color: rgb(41, 44, 46);
        margin: 10px 5px;

    }

    .container a.link {
        display: block;
        padding: 3px 6px;
        width: 80%;
        margin: 5px auto;
        text-align: center;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        font-size: 1.4em;
        background-color: rgb(66, 56, 75);
        color: white;

    }

</style>

<div class="container">
    <h1>
        Validare cont E-mag Laravel test
    </h1>

    <p>
        Pentru a va putea folosi contul si a putea plasa comenzi pe zitul Emag-Test trebuie sa va validati contul.<br>
        Pentru validarea contului apasati butonul de mai jos!
    </p>
    <a href="{{ $url }}" class="link">Valideaza cont</a>
    <p>
        Daca acest buton nu functioneaza copiati linkul de mai jos si dati paste in bara de adrese a browserului Dvs -
        mozilla firefox, google chrome, safari etc.<br>
        <span style="color: blue"> {{ $url }}</span>
    </p>
    <p>
        Pentru orice alte nelamuriri contactati administratia sitului la adresa <a
            href="mailto:admin@gmail.com">admin@gmail.com</a>.
    </p>

</div>
