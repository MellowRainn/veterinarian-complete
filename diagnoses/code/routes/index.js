import express from 'express';
import { getDiagnoses, getDiagnosis, setDiagnosis } from '../controllers/diagnosesController.js';
const router = express.Router();

router.get('/diagnoses', getDiagnoses);
router.get('/diagnoses/:id', getDiagnosis);
router.post('/diagnoses', setDiagnosis);

router.use((req, res, next) => {
  res.status(404).send("Sorry can't find that!");
});

export default router;
