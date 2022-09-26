import express from 'express';
import cors from 'cors';
const router = express.Router();
import { getPets, getAnIndivualPet } from '../controllers/petsController.js';

// these routes are not that logical, and are here for testing supabase and google sheets api
router.get('/pets', cors(), getPets);

/**
 * Google sheets are interesting tools you can use. In this case we want to find the appropriate pet name.
 * However, to do so, you have to search through the whole result set. It is important to try to cache the result.
 */
router.get('/pets/:id', cors(), getAnIndivualPet);

export default router;
