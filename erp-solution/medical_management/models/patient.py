# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class Patient(models.Model):
    _name = 'patient'
    _description = 'Patient Model'

class PatientType(models.Model):
    _name = 'patient.type'
    _description = 'Patient Type Model'
