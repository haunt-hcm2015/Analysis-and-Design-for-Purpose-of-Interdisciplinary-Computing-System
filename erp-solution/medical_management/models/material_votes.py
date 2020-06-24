# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class MaterialVotes(models.Model):
    _name = 'medical.material.votes'
    _description = 'Material Votes Model'
    material_votes_type_id = fields.Many2one('medical.material.votes.type', string='Material Votes Type')
class MaterialVotesType(models.Model):
    _name = 'medical.material.votes.type'
    _description = 'Material Votes Type Model'
    name = fields.Char('Type Name')
    description = fields.Char()