# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class Citizen(models.Model):
    _name = 'citizen'
    _description = 'Citizen Model'
    last_name = fields.Char('Last Name')
    middle_name = fields.Char('Middle Name')
    first_name = fields.Char('First Name')
    other_name = fields.Char('Other Name')
    date_of_birth = fields.Date('Date of Birth')
    gender = fields.Selection([
                                ('male', 'Male'), 
                                ('female', 'Female')
                            ])
    home_town = fields.Char('Home Town')
    nation    = fields.Char('Nation')
    religion  = fields.Char('Religion')
    image     = fields.Image('Image')
    phone_number = fields.Char('Phone Number')
    address = fields.Many2many('civil.status.address')
    card_ids = fields.One2many('id.card', 'citizen_id', string="ID Card Number")
    household_id    = fields.Many2one(comodel_name='household.book', string="Household Book Number")
    birth_certificate_id = fields.Many2one(comodel_name='birth.certificate', string="Birth Certificate Number")
    
    
    patient_ids = fields.One2many('medical.patient', 'citizen_id')
    patient_id = fields.Many2one('medical.patient', compute='compute_patient', inverse='patient_inverse')
    @api.depends('patient_ids')
    def compute_patient(self):
        if len(self.patient_ids) > 0:
            self.patient_id = self.patient_ids[0]
    def patient_inverse(self):
        if len(self.patient_ids) > 0:
            patient = self.env['medical.patient'].browse(self.patient_ids[0].id)
            patient.citizen_id = False
        self.patient_id.citizen_id = self
    


    