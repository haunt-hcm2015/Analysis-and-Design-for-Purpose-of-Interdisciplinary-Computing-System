# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class Services(models.Model):
    _name = 'medical.services'
    _description = 'Services model'
    name = fields.Char('Services Name')
    service_type_id = fields.Many2one('medical.services.type', string='Services Type')
    service_group_id = fields.Many2one('medical.services.group', string='Services Group')
    subclinical_id = fields.Many2one('medical.subclinical', string='Subclinical')
class ServicesType(models.Model):
    _name = 'medical.services.type'
    _description = 'Services type model'
    name = fields.Char('Type Name')
    description = fields.Char()
class ServicesGroup(models.Model):
    _name = 'medical.services.group'
    _description = 'Services group model'
    name = fields.Char('Group Name')
    description = fields.Char()
