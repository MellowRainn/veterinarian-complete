# Veterinarian case micro services

In this repo you can find the design and the code for the veterinarian micro services case. For learning purposes (docker) we added all microservices to one repo. You can clone this repo, however, there are some restraints.

## Installation restraints

* The appointments and diagnoses micro service depend on Supabase, so you have to have an account. For supasbase you should set up some tables as described in the ER-diagram.
* The Pets micro service depends on Google sheets, so you should have an account to Google sheets and have writing access to one sheet using a service account.
* All credentials to different services are stored in a variables.env file. So you have to set that up as well.

## Work to be done
womp

* a lot of repitition is still in the code, this can be optimised.
* some of the responses are not that neatly setup, especially the statuscodes and the json could be better
* some routes are missing a query paramater to query a response for example appointments for a certain date
