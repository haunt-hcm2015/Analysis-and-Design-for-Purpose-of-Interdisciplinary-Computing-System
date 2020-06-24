# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class MedicalCard(models.Model):
    _name = 'medical.card'
    _description = 'Medical Card Model'
    card_number = fields.Char()
    patient_id = fields.Many2one('medical.patient', string='Patient')
    card_type_id = fields.Many2one('medical.card.type', string='Card Type')
    card_group_id = fields.Many2one('medical.card.group', string='Card Group')
    citizen_id = fields.Many2one('citizen', string='Issued By')
    issued_date = fields.Date()
    validity = fields.Date()
class MedicalCardType(models.Model):
    _name = 'medical.card.type'
    _description = 'Card Type Model'
    name = fields.Char('Type Name')
    description = fields.Char()
class MedicalCardGroup(models.Model):
    _name = 'medical.card.group'
    _description = 'Card group model'
    _rec_name = 'code'
    code = fields.Char('Group Code')
    card_group_type_id = fields.Many2one('medical.card.group.type', string='Group Type')

class MedicalCardGroupType(models.Model):
    _name = 'medical.card.group.type'
    _description = 'Card group type model'
    name = fields.Char('Group Name')
    description = fields.Char()


