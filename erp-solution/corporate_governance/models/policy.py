# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class Policy(models.Model):
    _name = 'governance.policy'
    _description = 'Policy Model'
    title = fields.Char('Policy Title')
    number = fields.Integer('Policy Number')
    content = fields.Char('Policy Content')
    effective_date = fields.Date('Policy Effective Date')
    expire_date = fields.Date('Policy Expire Date')
    payment_option = fields.Selection([
        ('credit','Credit Card'),
        ('debit', 'Debit Card'),
        ('cheque', 'Cheque'),
        ('money_transfer','Money Transfer'),
        ('bank_transfer','Bank Transfer'),
        ('cod','Cash on Delivery'),
        ('ach','Automated Clearing House'),
        ('contactless_cards', 'Contactless Cards')
    ], string='Payment Option')
    policy_insurance_id = fields.Many2one('governance.policy.insurance', string='Policy Insurance')
    
class PolicyEditLog(models.Model):
    _name = 'governance.policy.edit.log'
    _description = 'Policy Model'
class PolicyCategory(models.Model):
    _name = 'governance.policy.category'
    _description = 'Policy Model'
    name = fields.Char('Category Name')
    description = fields.Char()
class PolicyVersion(models.Model):
    _name = 'governance.policy.version'
    _description = 'Policy Model'
    min_policy_type_version = fields.Integer()
    major_version = fields.Integer()
    minor_version = fields.Integer()
    description = fields.Char()
    version_info = fields.Char('Version Informtion')