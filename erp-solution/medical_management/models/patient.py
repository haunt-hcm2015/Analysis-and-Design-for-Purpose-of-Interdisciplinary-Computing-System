# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class Patient(models.Model):
    _name = 'medical.patient'
    _description = 'Patient Model'
    patient_code = fields.Char(help='Code Format: [Department of Health Code]  [Hospital Code] [Year] [Numerical Order]')
    reception_code = fields.Char(help='Code Format: [yyyymmdd]-[numerical_order]')
    citizen_id = fields.Many2one('citizen', string='Patient Information')
    patient_state_ids = fields.Many2many('medical.patient.state', string='Patient State')
    patient_type_id = fields.Many2one('medical.patient.type', string='Patient Type')
    medical_card_ids = fields.One2many('medical.card','patient_id', string='Medical Card')
    icd_code_ids = fields.Many2many('medical.icd.code', string='ICD Code')
    icd_subsidiary_ids = fields.Many2many('medical.icd.subsidiary', string='ICD Subsidiary')
class PatientType(models.Model):
    _name = 'medical.patient.type'
    _description = 'Patient Type Model'
    name = fields.Char('Type Name')
    description = fields.Char()
class PatientState(models.Model):
    _name = 'medical.patient.state'
    _description = 'Patient State Model'
    name = fields.Char('Patient State')
    description = fields.Char()
