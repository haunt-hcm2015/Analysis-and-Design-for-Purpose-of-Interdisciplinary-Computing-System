# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class Patient(models.Model):
    _name = 'medical.patient'
    _description = 'Patient Model'

class PatientType(models.Model):
    _name = 'medical.patient.type'
    _description = 'Patient Type Model'
