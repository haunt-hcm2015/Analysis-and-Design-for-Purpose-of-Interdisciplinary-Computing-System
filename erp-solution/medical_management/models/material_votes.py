# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class MaterialVotes(models.Model):
    _name = 'Material.votes'
    _description = 'Material Votes Model'
class MaterialVotesType(models.Model):
    _name = 'material.votes.type'
    _description = 'Material Votes Type Model'