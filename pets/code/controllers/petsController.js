import { getDataPromise } from '../adapters/googleSheetAdapter.js';

export async function getPets(req, res) {
  const rows = await getDataPromise();
  // console.log(rows);
  const pets = {};
  pets.meta = {
    url: req.originalUrl,
    title: 'All pets',
  };
  pets.data = [];
  rows.forEach((row) => {
    const pet = {};
    pet.name = row[0];
    pet.species = row[1];
    pet.breed = row[2];
    pet.number = row[3];
    pet.owner_name = row[4];
    pet.owner_email = row[5];
    pet.url = `${req.originalUrl}/${pet.number}`;
    pets.data.push(pet);
  });
  res.status(200).json(pets);
}

export async function getAnIndivualPet(req, res) {
  const petsResponse = await fetch('http://localhost:3011/pets');
  const petsJson = await petsResponse.json();
  console.log(petsJson.data);
  const pet = petsJson.data.find((pet) => pet.number == req.params.id);
  res.status(200).json(pet);
}
