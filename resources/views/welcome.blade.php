<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Landing Page</title>
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />
    
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            color: #333;
            background-color: #f4f4f4;
        }

        .hero {
            background-image: url('data:image/jpeg;base64,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'); /* Replace with your own image URL */
            background-size: cover;
            background-position: center;
            height: 600px;
            color: #3811a3;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .hero h1 {
            font-size: 3em;
            margin: 0;
            font-weight: bold;
        }

        .hero p {
            font-size: 1.2em;
            margin-top: 10px;
        }

        .cta-button {
            background-color: #007bff;
            color: #fff;
            padding: 15px 25px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 1em;
            margin-top: 20px;
            display: inline-block;
        }

        .cta-button:hover {
            background-color: #0056b3;
        }

        .services {
            padding: 50px 0;
            background-color: #fff;
            text-align: center;
        }

        .services h2 {
            font-size: 2.5em;
            margin-bottom: 20px;
        }

        .services .service {
            display: inline-block;
            width: 30%;
            box-sizing: border-box;
            padding: 0 15px;
            margin-bottom: 30px;
        }

        .services .service img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
        }

        .services .service h3 {
            font-size: 1.5em;
            margin: 10px 0;
        }

        .contact {
            background-color: #007bff;
            color: #fff;
            padding: 50px 0;
            text-align: center;
        }

        .contact h2 {
            font-size: 2.5em;
            margin-bottom: 20px;
        }

        .contact p {
            font-size: 1.2em;
        }

        .contact a {
            color: #fff;
            text-decoration: underline;
        }

        .contact a:hover {
            color: #d3d3d3;
        }

        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 20px 0;
        }
    </style>
</head>
<body>
    <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3" style="height: 3.5rem">

        <div class="flex items-center ml-4">
            <span class="text-xl font-bold text-gray-900 dark:text-white" style="text-weight:10px"> <i style="margin-left:10px; margin-top:13px;'" class="fa fa-hospital">CareCure</i></span>
        </div>
        @if (Route::has('login'))
            <nav class="flex justify-end space-x-4" style="margin-left: 1100px; margin-top:-15px;">
                @auth
                    <a
                        href="{{ url('/dashboard') }}"
                        style="
                            background-color: #1D4ED8;
                            color: white;
                            border-radius: 0.375rem;
                            padding: 0.5rem 1rem;
                            text-align: center;
                            display: inline-block;
                            transition: background-color 0.3s, transform 0.3s;
                        "
                        onmouseover="this.style.backgroundColor='#1E40AF';"
                        onmouseout="this.style.backgroundColor='#1D4ED8';"
                        onfocus="this.style.outline='2px solid #FF2D20';"
                    >
                        Dashboard
                    </a>
                @else
                    <a
                        href="{{ route('login') }}"
                        style="
                            background: linear-gradient(to right, #3B82F6, #6366F1);
                            color: white;
                            border-radius: 0.375rem;
                            padding: 0.5rem 1rem;
                            text-align: center;
                            display: inline-block;
                            transition: background 0.3s, transform 0.3s;
                        "
                        onmouseover="this.style.background='linear-gradient(to right, #2563EB, #4F46E5)';"
                        onmouseout="this.style.background='linear-gradient(to right, #3B82F6, #6366F1)';"
                        onfocus="this.style.outline='2px solid #FF2D20';"
                    >
                        Log in
                    </a>
    
                    @if (Route::has('register'))
                        <a
                            href="{{ route('register') }}"
                            style="
                                background: linear-gradient(to right, #10B981, #14B8A6);
                                color: white;
                                border-radius: 0.375rem;
                                padding: 0.5rem 1rem;
                                text-align: center;
                                display: inline-block;
                                transition: background 0.3s, transform 0.3s;
                            "
                            onmouseover="this.style.background='linear-gradient(to right, #059669, #0D9488)';"
                            onmouseout="this.style.background='linear-gradient(to right, #10B981, #14B8A6)';"
                            onfocus="this.style.outline='2px solid #FF2D20';"
                        >
                            Register
                        </a>
                    @endif
                @endauth
            </nav>
        @endif
    </header>
    
    
    <div class="hero">
        <h1>Welcome to the CareCure</h1>
        <p>Providing Quality Healthcare with Compassion</p>
        <a href="#services" class="cta-button">Explore Our Services</a>
    </div>

    <div id="services" class="services">
        <h2>Our Services</h2>
        <div class="service">
            <img src="https://media.istockphoto.com/id/513438317/photo/doctor-nurse-and-paramedics-wheeling-patient-on-stretcher.jpg?s=612x612&w=0&k=20&c=iagHKq8nLpWZRfUTkVqZl0m54fzyHfaDapILk74KV7Y=" alt="Service 1">
            <h3>Emergency Care</h3>
            <p>24/7 emergency services to handle any critical situation.</p>
        </div>
        <div class="service">
            <img src="data:image/jpeg;base64,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" alt="Service 2" height="400px" width="300px">
            <h3>General Consultation</h3>
            <p>Consult with our experienced doctors for your general health needs.</p>
        </div>
        <div class="service">
            <img src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBxISEhUTExIVFRUVFRcVFRgVFxUVFRUVFRUWFxUVFRUYHSggGBolGxUVITEhJSkrLi4uFx8zODMtNygtLisBCgoKDg0OGhAQGy0dHyUtKystLS0tLS0tKy0tLS0tLSsrLS0tLS0tLS0tLS0tLS0tLS0tKy0tLS0tLS0tLSstK//AABEIAMMBAwMBIgACEQEDEQH/xAAcAAABBQEBAQAAAAAAAAAAAAAEAAIDBQYBBwj/xAA/EAABAwIEAwUGAgkEAgMAAAABAAIRAyEEBRIxQVFhBiJxgZETMkKhscFS8AcUIzNictHh8VNzgpJjshUWJP/EABoBAAIDAQEAAAAAAAAAAAAAAAEDAgQFAAb/xAAoEQACAgEEAgEEAgMAAAAAAAAAAQIRAwQSITETQVEFFCIyYXEjQoH/2gAMAwEAAhEDEQA/APcUkklxwkklDiMQGb78uKDaSthSvolSVXUxTjxgdE0Od+I+qrPUx9IasLLYiUJicro1PfptPlf1CGGIe3jPiiKOYDZ1vopLPCXDA8cl0V9bsphjs1zfBx+6Brdi2/DVI8QCtSDK6mPFBkNzMNW7JV2+65rvOCgqmTYhnvUz5X+i9BxFcMEn0G5QwzH+G3jdInDHHi6Jx3PpGFbSINwR4hEUltKuIpFjnO06WjvSNlkcbjWPdLGBreEbnqUrJBRV2NxQlN1RKwqcLuXgPCKbgCdiPA2S4sM8biwUKaiyfAXKdUwVRvwnyulRd3XenyRnwdjVswPajNsYKuqk/S1t9MCHDrIW57P5h+sUKdWI1tBI5HYj1lZzPaMidrR6K97JUNGGY3xI8CSR9UmPZo6hR8aaNBTQOPOl3inuqkG6ixnehMbVFKMOeRoTgmsFl1FSFThtY5dATZXQVNEB6cCmroKkRHLoXElxx1C5ljxSbzcfdHPqeibmWYNoi93H3Rz6nkFn6YdUeXOMuP0GwHIK7pdL5Hul0Ky5NvC7FUY55LnOMm5uQki/1U8x80ls7IfBU3P5N0kkuLILZBjMSGDqdgqqSTJuUzGYjW88hYKSms7Nl3Sr0XMePbGyRoT4SAToSQtjCEPUpSiiEwhRkgpjaFZzNj6qV+LeeIHgoi1JrUVlmlSYHGLd0cgk3MpxaugLhKhbCVmb4XWwi/l02WWpVNI0ncEgrdOvushm+WvbiA5jS5j4NpMOHPy+iNlvBP0y7yPYq2c1V2VUHNb3hCsEbEZHcjvtngEA7iL3jwVdh6WixKsCVE8AoOTfYIUjO5ngDUrNG1MXd15BaXCNAaOAVXiMO4GQZHzCkbiCBF10XyPmt8VRPjaglKjcIN7pNlZUBAAUuyMlticATSFOQmFqIrsiSS0GUoU4sryjQ5PKjTlNEBwQ2PxzaTSTcxYfSellO94AJJgAEnoBcrz7M81D3OrVDoBsL/BJ0tjiblXdHp/LLnpCcktqD6uKL3F7zP0A5BS4DE6pdzMDwCyGNzcuEgQ20DnylXeCxOloH53W8oJKkU3/ACaD27+Y9Akq39bHVJdtAepIbMKulhPl5lEqtz18MA5uH3WDldQbL8Fckika66MoOVWal0bhqiyOmaLXBZtKeEPTepWlMTEtDlwhOXCV1AQyEiupEKLQRoTSE+EgFFII0tSDQnyugIpHWNSIXSuSpUcc0pjmp4Ka5yiFDC1MNAHgpSUguolbIm0QOCkBXSFwhFHXfZ0uTHOTiExzUTkkca6U8slR02opiMQToENktSr85zZtOqaZBltP2kjkXhhv/wAp8jyUPZvFGuypUDpBxFZoHJrH+zYB4hurzKaV3GiPtfjPZ4cib1CGDw3d8hHmvHcyzI1KnePdaSGN4C+/iV6L+kgOFTD/AIIqNJ4B50lsnwB9Csjg+yX6yC7WKVGnetiH2ptA95rfxv8Al9Ft6Jxhh3FTKm5UU9Ws4uY1suiXvgE6WtE6nR7o6lWdDNuoP29FW9ru1NAUjgsvaWYef21V377FEG2p24ZInT8gsxgMeQRJvz5/3TYaq5AeNUejjMT+I+qSxwxBN5XVa8yF7D6rZsqntA6zR4lWzVR5+7vgcm/Urz+d/wCMu4V+ZRP3ROFKGqbp1CpdZTNH0XVB1kSwqto1UZTeppiZIJ1LhUYK7KlZCjoKdKj1JpqIhollKUOMQ3mpG1AeK5xZw9OJTJTlwDllxIlIBcEY1qcQuriFBOQkE4BcRo46AuELoSK4BwJOCRTdSIaI3rtHEQYKbUcoKhUehlWqMx2+p7uae+6m6k4TBdTfqFjzGoleb9nu0mYYN7MPplhc4gFl3FxaXOngSGu47uK9Szag1zwA0vqus1jbuI5n8LRzNlR5xnOFyq7tFfGxZgM0sPz1Hcug7b+AurGFSlw1wKzOMUvkPx+NFLDe1zQta1zzUbRaJq1SCfZtH4WhpAJ43k8F5N2y7Z1scQyBSoM/d0WWYyLAmw1O6+iBzrOa2Mc+rWqan+8SZFhs0X0homwHpuVSyrsIbVRTlK2NKYQpIT2UC7biYHU8hzKYkRGNxDx8SSOOQYj8CSbsyfALR9ggrO5u6ajukD5LRLLY981HeKy88vxSLOBXKyurFRMfBU9UIV+6pMvosaFS4VlScqPDuurWi5AjJBrVIoqZSxWJbTEu47Abk9OnVOxwcnS7ETko8s5XqBokmAqmvjC8wLD5qLFYlzzLthsOAURfAtvstzTfT4wSlPlmfl1TfEeh6kbWLbjdRsa7jC7WdAV2eKM1TQiGSUXdlngscHNHgjmulZPKMTD3N4A28xP1laWjUC8xkjsk4/BtUnFNBKSTSulRIHISXV2Fxw1NcpCmkIHIaE5IBJcEY5RkqVwQuKrNY0ucQ1o3J2RJROuKrKmJdULm0S2Gz7Sq79zSA3k/E7oPNV+d5w1lL2ldzqVEg6KbbYnEwCe6CR7NkAmd49F5V2u7V4jFNDQfZYWe7QYNIbEAioR75B52uDCfjwXzIVPN6iabtX+kBlAOoZeSXOtWxTvffvakeA5HbkOK8qxWIc8y4knmSSd5uU7EPkD0P24qABXIpLoqtjUoA+39D9FNRoOe4NY0ucdgNz/S30Whw/Z8UxqqEOfyGzfPifkjKaiGOOUuihw2Hc92kNL3Hh93HhZbPs/kLabg6p36kb/Czo0fdOyPL20mG3eKvKJgXWtgwKKtlTLN9EpA5JIcuKStUKs91cbLGVaodUf/ADH6rYYgw1x5A/RYLCPl58z815DP6RsaZdhbwhKrbo+oEJVaqxbQyk6CrKhUlVTrKelXhGMHJ0uzpNJWy4qYoMbJvyHEnoq1zy8lztz8hyCju46neXRShq9HpNIsMbfZi6jO5ul0DkqWk2w9fNRFu/Uwp32Hor1lUcXIfG1NLS47AKVqz/afGg6aQO9z4cB+eSi2SirZzs88uxL+Whp+bltcM2wWZ7K4X3nx70AeDRA+i1TacLzGokpZZNfJux4gkwhhUihYVM1JRFnYXCE+F1SohZGAulqdCcQuo6yMBdhdJhU2ZZwAHCmWgM/eVXmKVIfxO4nkEUr4R1hGY49tKBdz3WYxt3OPQcB1WC7U9rGUHGzcTimkRSYdVHCkzv8A6lUQbc42lUHaDto58swZcGvltXFOltd5mIb/AKNKSBz7zZgb5fD0bxu8QWkd1zxyJ4OJEcIqM/iVrHiUeWKlNvgnxWJqV3+2rVi95JLargJsAYAFoDSHADdusRLUHi2WNovDm7gEd2fAExPFrmngiXuETqIY6PdsWvu4Fo5bvaD/AOViBq4ggjujUCGOa24I2aAOIg6Z4se3i1OFlRiWlpi/9uXjb5I/KcnqV9hpZxcZj/jzO3grLD5aIBrXDXEtbxjYaz4BsjmEe/GxYWHAcB4JcsvqJYx6e+ZBNDC06DYpj+ZxjU49eQ6CyGxFeUM/GSgK+JukqLbsfJqKpFmMYbXIHE/nirA5wyBIMcIvPUrJOxRNpMcuCa3GuHdaCSekx4Ld0+d7VZlZYKzXHN2/5KSyQy+ub+xd5xKSseWXwK2o+qO0OJ0UHkbkaR52WNyxt1Z9pcWargxt2NPqf7KPLsEQvJ5p7pGvhjtjyTOaoHtVk+mharIS6GKRWYkp2FpcSmsGt0/CNuvVEhb+i0njW+XZmarUub2roeAnNakE5q0CiR6Vx+10qtZo3KzGeZ067KZ723MM6nm7pwRClZZZpnFOiImXxIaN/PkFlMAH4muXHn6DgEG6g559nTu9xl7jeG8Sep5Lf9lcmFNjRHjPHqszXatRWyPZo6bT/wC0i7y3CBjAAjg1OY2E9YhcbGtapWrrWp0KSQtyOtSLV0BdhSogcAUdes1jS5xAA3JQuaZrToDvSXH3WNEuJ8AvOu2vbWnhiPaxWxESzDg/s6O+l1dw3Ox0bqUYOT4A3XZe9pu1FOnSNSo51OiZ0BgJr1/9sfCz+I2+i8qzvPauMIa4+yoNdqospkljSADqfP710Q+TcjVFwgGZg7GVHV3uLsQbOvGubtaJs0OgBsQGuaODrSAtAkSGOInSCCx8lzXNG4kgvaODm1KexhWoY1EXKVjWgNBs0RLarRdsWBJPEAENJ403td8JTKx+G8wTTJMEidJY5w+KRoJ/ExjuN+VKxbNhrplthdr2OFi38Qh5IHFlQt+FT4TJi6C6W0w7VTZPfALYDXO4QLcyGhSlJRXIYQlN0gMPdWJ9mO68d8+6GvBnV4l0PgXDtXAoynTbSuLviC4i9uXIK2/VYhoaANgBsm1cnc5VpZdxex6dQ/spH1yVxrSVbjKCDcIhmA4Qo70N2MohRKrMykea2hy8clSZ5lpLZaJIup45qxOWDoocsbrr02HYug+QJj5L0fL8BTEkMaOAsvOMrfFdk2IJ38CvTsDV7jet1v6NJpmPltE+jokuykr9CKN7QoAnZWdKiAENg2qwaF4WKN6bIKrYBJt1WaxeKNVxa2zRv18VY9osXtSG5u7w4Dz3VbRZAgLb0GlSXkn/AMM7U53+qJRay6+ReCeg3TqbFO0LUsolJijjT+7FFg66nHzVLmVLNWAuGIowBMaT5AdVr3uVBnWLk6QbNu7xUr4CuzGf/da7DoxVPTNtbZ9d1Ma81A1lw4Ag+PFVPbLFMqaWNubHy/IRPZmmZbvsAPDks/VapwTS7L+DApO2brs9lwAgC5Mk8Seq3WCow0Kl7P4PSASFpGhYXbtl+brhDYTmtT9Ke0LkhLkcaE8BOalCYLbGaULmmMFGjUqH4GOd/wBQSFLisQGNLnENDRJJMAAbkk7Lx79IH6TGVWuw2FaKjXWfUeD7MibtY2xcDzNr2lSjFt0g+uTK43t3jHB7mEiq4nXUAl1NotFP8E8zfwWNdUmSTJJJJNySbkk8SthlvaumGinXoMLRtY2j8FZv7Vl+ftPJGVuzuBxQ10K/snHhUiCf9xncd4EMdzVtfj2K5kYXD1ix0jwI5jiCtHQd7a7Bqa+1USBBNxU6EwCY2eyfiXcH2Th8VXtqR8NIkg/zPj5BbrJuz5GnugCxAA7om+yXkzqPRYxaVvmXCM/lmT6dLjD3gRqgcyYA4XJ63Wiw2Tkm4sVqsHkoAFhy/wAK1pZeGgKhLI5O2XouMFSMzSygcALBF0srBAkDzhaD9WC43DyVG2c8hlcVlQGyDqYGBstjiMOOSp8cyAo2yUZWZ2rhUJVwoIuFc1GoZ7EVMk0ebdpsu0O1NEEGQeqsMtzz9m3vBsCDO0hWnarDSzqvPKrSCQtfR6hwRmarCmzZP7QsB/ejyBhcWQDSuK998/gqfbo+qMGbKXMMa2lSc88NhzcfdHqh8I6you1GM1VWUgbMGt38zpAHkPqsbSYfLkUS5nmoRbIqVQvJc67iZPny6I6m1V2GVlR2XpKSVIyG7ZMwJOK6ChMZpO4BQQCHHV9DSeJ28Vh87zAMa587b9VYZ7jTRbraXPp/ExxJIbxcw7gjkV5/2izEVHaGGWWdPORIn1UM8/HEbhhbAqby95cfiJPgJsF6J2TwWxiV51gR3gvWeyTbBYOdtmthVG8y1sDyVi0qrwj4ARjairJ0GSsK1JakNrTK2IDQXOIDQJJJgAdSV24htDQ9U/aPtVh8EyajtT47tNl3u8uA6lZzOO1r3n2WEBJNtcXP8jeX8Rt0Xm2d5u1tVzKZGJrzd479Jpkd4vJ/aED/AIgn4rJuOLYudII7V9oa+Nh+MqGhhvep4elBfUjYyQJ/ncIHBqzGa45j2NazC0qEEaQwvdVIiP2j3Hvc5gSeCMw2S4mtVuHVKzokuvp632jmb9At92c/Ru1sPrd5334p8skYIEcblyzzXK+zlavcNMeF/wCy3GSdgnWLxEcAJ9SvTcJlFOmAGtEDZGspAcFVyZpSLcIwh12ZrL+zLGcI/PJXuGwQb9EWGhSBKDKbY0MCULrnLkriHIxzEmiFIE0hcGyJ8GyqMwoCNlcvMBV+McFGQyDdmXrtvdDvCuMVhwboB7AOiiWLKbNsPrbETZed47KnBxXrBaFWY7LmG9lYx5HEVkhuPPW5aY2SW8ZlwjZJN8zFeJHo1GqAJOwEnwFysjTqmpUfUPxuJ8ATYekKyzrFRR0jeoQ3y3d8hHmgcHTgBan0vFUXkZna6XKiH4dqOplC0Wopq0mUBz6sKrx9QniW8i3fz5o6u6N1TZhWi0wTt1RigGP7Q5mWh7HAawPh92ox1g4DgQdwsMRC0vaQB1UdAY8DH3lUlaisvV5LntNHDCo2PyxveC9Q7MPgBeb5UzvL0bISs3Ky7iXBs6NZF06qqBiA0aiQABJJMAAbkk7LJ59283p4XwNUi3gxpF/5j6JCi5dEptLs22bZ9Sw4hx1P3DG+8fH8I6lef9pO0j3uAqu0tMuDR7jQ3chp990kC/yVTg65Jc5xLnEySTJJPElWFPDtqVG90uqe62ASbkWt5Jqgovkrubl0UA/WcYXNph9DDkjUTHtagE7uG43Okd0dVo8k7NTDaNMBs3eb8YJnib7LW5Xl5YA3um3eGmb9XTsPmr+hZoEAAbAAADyRnl4pBji5tkGTZRToNhrbncm5PmrUIfUnGqqrkP2k5cEioPaJ4qBcmdQ8FSBD6pUrCigNHSmp5UTgUGciYJjkmldc1EBG4IHFQLlF13QFT406Zc4+HEno0KDHQRXZhXuQLfnnsqOvWd4jmJ+oKssTWe4Xbbzn7qpxFflTE87z5ggn1XRHHWvbEk28NX91PSxLDYEdLz8hx81WtY0kuq6eGzQRfw280sVimwGsmXENhpvF5PLb7ebUiLYVUxzJNieoNjzSVQc3Le6HUwBaNTREcIhJT2i7Rp8a7XUA4MEeZufsjMMxCYWlFzuVaYRi9Phx+PGomBlnvm5E9JqmK4yAk9ykLBq74WYzt4a2TdvxDi3+If0WgxL1mM5dMjyRctsWwxVujH1KTjBdv9ht8kLWp3hXxwlgBwshKmGvPT5rzksm6TZtqFJIGy+lBWqpZiKDNZBMWAG5J28FU4XD7W8VZVMFrYWnj8iNiltp9k1FpcAGPzOpiLvdDeDBOkdT+I9T8lV1Whpmybjm1KRLXbcwVHg9VRwAbq5T7vnzHROVJFZxlJ8ljgsK+pEe7w6nk0C5Nv6r0Ps5kmgAuEbEk7uNoBPlsLb77oTsnk4Dg58uOnflAMNaNgOgWhFfURwDdm8ucjmkTnY6GNRCW6RZuykOyGeY2tK4K0JDHJBIqFdJQgrJ4qKFBolNUBPZUnZDF6QfGwRDQc2oiGOQFKtzRdOoiuyLQSF0prbp8KQtiAXS1IFQ42vpbA3NguZH2BYmsSTpi1iTsByHN3RAmhqJcZnYTv1R5pgNjohcQWjn0E/NLHx4KzHtNwD4rOZiIgAEu53JMWuJgD5K6x+ODQYnqTe6zWIrPdcuGk+I1bbxB+yMUOK7FuqbFwAFzDuflsqupUNyCQNvEu977q59mZ7gZG5090ddvK6pcWwQCONrdAZ+asQETZXsbUIkFsHmJPmkmt18HxwiTwXU6hFnrbRdEbCe8CNi0THlxTW07o/Dr0l8GGDYXMGVSWhw9o3cXEjmAVI96ZmeXMrCfde27KjbOafuOirqOLcSaVURVbcx7tRvB7PuOC5K+gkld26zlduup4XVzi6sAoHL6EhzzsTHkP7n5Krrp7MTLOkhuyIAq4bign0ldYukRtsg3UCSvOpm5RBhad1c4XDLmX4OdwrvDYWBsg2d0ZzOMhFQTxCZlWSaNhda91AQp8PRDG90CT3id/CEU2RbIqdX2DQ2ZdINzyG0crlcwLSTJMz59fum1W6z3hEneZjhxU9AQ63Pf7wh2R/kJLJdcEAN/wAIGpUAJG03Hgh80zPSHMbcncmbeSqsPUJuSuaDFFqcTey61/H1QReB0H54IZmIc4wwEnkLkealHG5dHSko8ss34kBSU8YDxQLMrrO3c1nkXk+NxHqnf/EV2m1Sm4eDmn7/AFVr7DJXQn7rHdWW9GsjaFS6z0upEaxvxF2+qsMJXnjb6+aqZMUoOmPUlNWjQU3qYFAYZ8owOhQISQ4uhCOGpwJ4IgmVGBxQYENqsnwQGPNj+dkbUf8An6quzCtY/n83hRYyPZmq7NRvaDxHRV2Kw8i0gcon/CvqGHDrxYSfW5lA1quh0RY2veJ6C/Loghpn8TQLW96bOvsIBAM/I+qqsRSIIk2aHT/1J+shaHGVQSWz7wkRcGBeDxtq8wFU1qDtExu2Nrd6TM/9wnwYjIZLEF4cYBInlO90lYmqWyIbuSNW8OuJ8iElZsrHr9IIqmuJL0JjkioO09g14s5j2aTxGp4a4eBBIhJJSh2cA5ibnzRWWtHs2+f1XElm/Vf0X9mh9P8A2Y3FCHKCiO+RwSSWCjWLnCNCsGtCSSJF9nKgspWnujwSSRRFgYeSZPD+gXaToBjkT5iYSSROfRmNZJJJmTf1RFPZJJcS9Eb3GSJ2ErQ5PRa2nIEEm/VJJan05csz9Z0gs7KMDY+CSS2DNZHi72Ox3QOVvMeZXUllfVV+pqaDpl7hTujGlJJYiLbJGbFPOySSL6AC4r7Kpx2zvD7FJJQYyJ3DtGgeCps2piJi/PjuupIIJknVDDb7OaB0BbcfJFPH/wCdx/CbeTXR/wCx9Ukk9C5GdzURVMAbN4DixpKSSSsIrn//2Q==" alt="Service 3" height="600px" width="400px">
            <h3>Specialized Treatment</h3>
            <p>Get specialized care for a variety of medical conditions.</p>
        </div>
    </div>

    <div class="contact">
        <h2>Get in Touch</h2>
        <p>If you have any questions or need more information, <a href="mailto:info@hospital.com">email us</a> or call us at +1234567890.</p>
    </div>

    <footer>
        <p>&copy; 2024 Our Hospital. All rights reserved.</p>
    </footer>
</body>
</html>
