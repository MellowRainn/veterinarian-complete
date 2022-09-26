import {
  getDiagnosisData,
  getDiagnosesData,
  setDiagnosisData,
} from '../adapters/supabaseAdapter.js';

export async function getDiagnoses(req, res) {
  const diagnoses = [];
  const rows = await getDiagnosesData();
  if (rows.length > 0) {
    rows.map((diagnose) => {
      diagnoses.push({
        url_to_self: req.originalUrl,
        complaint: diagnose.complaint,
        diagnose: diagnose.diagnosis,
        appointment: `/appointments/${diagnose.appointment}`,
      });
    });
    res.status(200).json(diagnoses);
  } else {
    res.status(500);
    res.json({
      title: 'no diagnoses found',
      message: `🥴 We did something wrong`,
    });
  }
}

export async function getDiagnosis(req, res) {
  const diagnosis = await getDiagnosisData(req.params.id);
  console.log(diagnosis);
  if (diagnosis > 0) {
    res.status(200).json({
      meta: {
        title: 'individual diagnosis',
        appointment: `http://localhost:3010/appointments/${diagnosis[0].appointment}`,
      },
      data: {
        complaint: diagnosis[0].complaint,
        diagnosis: diagnosis[0].diagnosis,
      },
    });
  } else {
    res.status(404).json({ message: 'diagnosis is not found' });
  }
}

export async function setDiagnosis(req, res) {
    const diagnosis = {};
  if (req.body.diagnosis && req.body.complaint && req.body.appointment) {
    diagnosis.diagnosis = req.body.diagnosis;
    diagnosis.complaint = req.body.complaint;
    diagnosis.appointment = req.body.appointment;
    const rows = await setDiagnosisData(diagnosis);
    if (rows.length >= 0) {
      res.json({
        title: 'appointment added',
        message: `📅 Appointment for ${diagnosis.complaint} is made on ${diagnosis.diagnosis} at ${diagnosis.appointment}`,
      });
    } else {
      res.status(500);
      res.json({
        title: 'cannot add appointment',
        message: `Unknown causes`,
      });
    }
  } else {
    res.status(422);
    res.json({
      title: 'cannot add appointment',
      message: `You need to set diagnosis, complaint and appointment`,
    });
  }
}
