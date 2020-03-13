# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class Citizen(models.Model):
    _name = 'citizen'
    _description = 'Citizen Model'
    last_name = fields.Char('Last Name')
    middle_name = fields.Char('Middle Name')
    first_name = fields.Char('First Name')
    gender = fields.Selection([
                                ('male', 'Male'), 
                                ('female', 'Female'), 
                                ('other', 'Other')
                            ])
    identity_card_number = fields.Integer('Identity Card Number')
    issued_by = fields.Char('Place of Issuance of Identity Card')
    