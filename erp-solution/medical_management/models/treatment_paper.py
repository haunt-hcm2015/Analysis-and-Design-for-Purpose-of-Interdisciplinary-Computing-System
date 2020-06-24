# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class Treatment(models.Model):
    _name = 'medical.treatment'
    _description = 'Treatment Model'
    medication_id = fields.Many2one('medicine', string='Medication')
    surgery_id = fields.Many2one('medical.surgery', string='Surgery')
    method = fields.Selection([
        ('medication','Medication'),
        ('surgery','Surgery')
    ], 'Method')
    cost = fields.Float('Treatment Cost')
class Disease(models.Model):
    _name = 'medical.disease'
    _description = 'Disease Data Model'
class Symptom(models.Model):
    _name = 'medical.symptom'
    _description = 'Symptom Data Model'
class TreatmentSymptom(models.Model):
    _name = 'medical.treatment.symptom'
    _description = 'Treatment Symptom Data Model'
class DiseaseSymptom(models.Model):
    _name = 'medical.disease.symptom'
    _description = 'Treatment Symptom Data Model'
class TreatmentPaper(models.Model):
    _name = 'medical.treatment.paper'
    _description = 'Treatment Paper Model'