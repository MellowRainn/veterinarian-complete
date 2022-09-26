import * as dotenv from 'dotenv';
import { createClient } from '@supabase/supabase-js';
dotenv.config({ path: 'variables.env' });

//TODO: to improve this code, you might consider working with models as well. A model is then a representation of a resource.
//TODO: write some generic select, update, delete code to improve the code. However, do not write your own framework ☺️

console.log('url', process.env.SUPABASE_URL);

// my supabase client
const supabase = createClient(
  process.env.SUPABASE_URL,
  process.env.SUPABASE_KEY
);

/**
 * Function to get the data from one Diagnosis
 *
 * @param {*} id the id form a diagnosis
 * @returns diagnosis data
 */
export async function getDiagnosisData(id) {
  console.log('👀 for id:', id);
  const { data, error } = await supabase
    .from('diagnoses')
    .select('*')
    .eq('id', id);
  if (error) console.log('query error', error);
  else return data;
}

/**
 * function to read all the diagnoses
 * @returns an array of diagnoses
 */
export async function getDiagnosesData() {
  const { data, error } = await supabase.from('diagnoses').select('*');
  if (error) console.log('query error', error);
  else return data;
}

/**
 * Function to write a specific diagnosis
 * @param {*} diagnose
 * @returns
 */
export async function setDiagnosisData(diagnosis) {
  /**
   * TODO: you can not set multiple diagnosis for one appointment id.
   */
  const { data, error } = await supabase.from('diagnoses').insert([
    {
      complaint: diagnosis.complaint,
      diagnosis: diagnosis.diagnosis,
      appointment: diagnosis.appointment,
    },
  ]);
  if (error) console.log('Error', error);
  else return data;
}
