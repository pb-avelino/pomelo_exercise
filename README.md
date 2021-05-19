
# Pomelo Excercise

## Installation

```bash
$ composer install
```

## Database creation
Create a new dastabase and add the credential to an .env file at the root of the project.

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=pomelo_exercise
DB_USERNAME=
DB_PASSWORD=
```

Use _artisan_ to crate the requierd tables

```bash
$ php artisan migrate
 ```

## Mock Data
This project uses Faker to seed the database with mock data.
```bash
php artisan db:seed
```

## Start Application
```bash
$ php artisan serve
```

# Api Endpoints
http://127.0.0.1:8000/api/


## Show Clinics
----
  Returns a collection of Clinis.

* **URL**

  /clinics

* **Method:**

  `GET`

* **Headers:**

    `Content-Type: application/json`<br />
    `Accept: application/json`

* **Success Response:**

  * **Code:** 200
 
* **Error Response:**

  * **Code:** 404

* **Sample Call:**

```bash
curl -L -X GET 'http://localhost:8000/api/clinics' \
-H 'Content-Type: application/json' \
-H 'Accept: application/json'
```

## Show a Clinic
----
  Returns single Clinic.

* **URL**

  /clinics/{id}

* **Method:**

  `GET`

* **Headers:**

    `Content-Type: application/json`<br />
    `Accept: application/json`
  
*  **URL Params**

   **Required:**
 
   `id=[integer id|string uid]`

* **Success Response:**

  * **Code:** 200
 
* **Error Response:**

  * **Code:** 404

* **Sample Call:**

```bash
curl -L -X GET 'http://localhost:8000/api/clinics/1' \
-H 'Content-Type: application/json' \
-H 'Accept: application/json'

curl -L -X GET 'http://localhost:8000/api/clinics/pomelo_clinic' \
-H 'Content-Type: application/json' \
-H 'Accept: application/json'
```

## Show a Clinic Providers
----
  Returns a collection of Provider for a Clinic.

* **URL**

  /clinics/{id}/providers

* **Method:**

  `GET`

* **Headers:**

    `Content-Type: application/json`<br />
    `Accept: application/json`
  
*  **URL Params**

   **Required:**
 
   `id=[integer id|string uid]`

* **Success Response:**

  * **Code:** 200
 
* **Error Response:**

  * **Code:** 404

* **Sample Call:**

```bash
curl -L -X GET 'http://localhost:8000/api/clinics/pomelo_clinic/providers' \
-H 'Content-Type: application/json' \
-H 'Accept: application/json'
```

## Show Providers
----
  Returns a collection of Providers.

* **URL**

  /providers

* **Method:**

  `GET`

* **Headers:**

    `Content-Type: application/json`<br />
    `Accept: application/json`
  
* **Success Response:**

  * **Code:** 200
 
* **Error Response:**

  * **Code:** 404

* **Sample Call:**

```bash
curl -L -X GET 'http://localhost:8000/api/providers' \
-H 'Content-Type: application/json' \
-H 'Accept: application/json'
```

## Show a Provider
----
  Returns a single Provider.

* **URL**

  /providers/{id}

* **Method:**

  `GET`

* **Headers:**

    `Content-Type: application/json`<br />
    `Accept: application/json`
  
*  **URL Params**

   **Required:**
 
   `id=[integer id|string uid]`

* **Success Response:**

  * **Code:** 200
 
* **Error Response:**

  * **Code:** 404

* **Sample Call:**

```bash
curl -L -X GET 'http://localhost:8000/api/providers/1' \
-H 'Content-Type: application/json' \
-H 'Accept: application/json'

curl -L -X GET 'http://localhost:8000/api/providers/rossie_mccullough' \
-H 'Content-Type: application/json' \
-H 'Accept: application/json'
```

## Show a Provider availablabilities to book and appointment. 
----
  Returns collection of Provider availabilities.

* **URL**

  /providers/{id}/availabilities

* **Method:**

  `POST`

* **Headers:**

    `Content-Type: application/json`<br />
    `Accept: application/json`
  
*  **URL Params**

   **Required:**
 
   `id=[integer id|string uid]`

* **Data Params**

    **Optional:**

    `from=[string] dateTime`<br />
    `to=[string] dateTime`

```json
    {
        "from" : "2021-05-18 09:00:00",
        "to" : "2021-05-18 09:30:00"
    }
```

* **Success Response:**

  * **Code:** 200
 
* **Error Response:**

  * **Code:** 404

* **Sample Call:**

```bash
curl -L -X POST 'http://localhost:8000/api/providers/rossie_mccullough/availabilities' \
-H 'Content-Type: application/json' \
-H 'Accept: application/json' \
--data-raw '{
    "from" : "2021-05-18 09:00:00",
    "to" : "2021-05-18 09:30:00"
}'
```

## Show a Patient
----
  Returns a single Patient.

* **URL**

  /patients/{id}

* **Method:**

  `GET`

* **Headers:**

    `Content-Type: application/json`<br />
    `Accept: application/json`
  
*  **URL Params**

   **Required:**
 
   `id=[integer id|string uid]`

* **Success Response:**

  * **Code:** 200
 
* **Error Response:**

  * **Code:** 404

* **Sample Call:**

```bash
curl -L -X GET 'http://localhost:8000/api/patients/1' \
-H 'Content-Type: application/json' \
-H 'Accept: application/json'

curl -L -X GET 'http://localhost:8000/api/patients/lacey_nolan' \
-H 'Content-Type: application/json' \
-H 'Accept: application/json'
```

## Show a Patient appointments
----
  Returns a collection of Appointments.

* **URL**

  /patients/{id}/appointments

* **Method:**

  `GET`

* **Headers:**

    `Content-Type: application/json`<br />
    `Accept: application/json`
  
*  **URL Params**

   **Required:**
 
   `id=[integer id|string uid]`

* **Success Response:**

  * **Code:** 200
 
* **Error Response:**

  * **Code:** 404

* **Sample Call:**

```bash
curl -L -X GET 'http://localhost:8000/api/patients/lacey_nolan/appointments' \
-H 'Content-Type: application/json' \
-H 'Accept: application/json'
```

## Book an appointment. 
----
  Created an appointment

* **URL**

  /providers/{id}/appointments

* **Method:**

  `POST`

* **Headers:**

    `Content-Type: application/json`<br />
    `Accept: application/json`
  
*  **URL Params**

   **Required:**
 
   `id=[integer id|string uid]`

* **Data Params**

    **Required:**

    `availability_id=[int]`

```json
    {
        "availability_id": 15
    }
```

* **Success Response:**

  * **Code:** 201
 
* **Error Response:**

  * **Code:** 404

* **Sample Call:**

```bash
curl -L -X POST 'http://localhost:8000/api/patients/lacey_nolan/appointments' \
-H 'Content-Type: application/json' \
-H 'Accept: application/json' \
--data-raw '{
    "availability_id": 15
}'
```

