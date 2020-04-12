# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class InsuranceBook(models.Model):
    _name = 'governance.insurance.book'
    _description = 'Insurance Book Model'
    book_number = fields.Integer('Insurance Book Number')
    name = fields.Char('Insurance Book Name')
    citizen_id = fields.Many2one('citizen', string='Owner Book')
    issued_by = fields.Many2one('place.of.issue', string="Place of Issue")
    signer_id = fields.Many2one('citizen', string='Signer Book')
    issued_date = fields.Date('Date of Issue') 
class Insurance(models.Model):
    _name = 'governance.insurance'
    _description = 'Insurance Model'
    code = fields.Char('Insurance Code')
    name = fields.Char('Insurance Name')
    abbr = fields.Char('Insurance Abbreviation')
    insurance_type_id = fields.Many2one('governance.insurance.type',string='Insurance Type')
    policy_insurance_ids = fields.One2many('governance.policy.insurance', 'insurance_id', string='Policy Insurance')
    asset_insurance_ids = fields.One2many('governance.asset.insurance', 'insurance_id', string='Asset Insurance')
    description = fields.Char('Insurance Insurance')
class InsuranceType(models.Model):
    _name = 'governance.insurance.type'
    _description = 'Insurance Type Model'
    name = fields.Char('Insurance Type')
    description = fields.Char()
class AssetInsurance(models.Model):
    _name = 'governance.asset.insurance'
    _description = 'Asset Insurance Model'
    asset_id = fields.Many2one('asset.asset', string='Asset')
    insurance_id = fields.Many2one('governance.insurance', string='Insurance')
    active = fields.Boolean()
class PolicyInsurance(models.Model):
    _name = 'governance.policy.insurance'
    _description = 'Asset Insurance Model'
    policy_id = fields.Many2one('governance.policy', string='Policy')
    insurance_id = fields.Many2one('governance.insurance', string='Insurance')
    active = fields.Boolean()